<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Seller;
use App\Models\Message;
use App\Models\Product;
use App\Models\ShopVisit;
use Illuminate\Http\Request;
use App\Models\StockMovement;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $userId = Auth::id();

        $seller = Seller::where('user_id', $userId)->first();
        if (!$seller) {
            return view('client.dashboard');
        }

        $shopIds = $seller->shops()->pluck('id');

        $totalProducts = Product::whereIn('shop_id', $shopIds)->count();

        $totalShops = $shopIds->count();
        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver']) // Charger les relations avec les utilisateurs
            ->orderBy('created_at', 'asc') // Trier par date de création
            ->get();

        $clients = User::whereIn('id', $messages->pluck('sender_id')->merge($messages->pluck('receiver_id'))->unique())
            ->where('id', '!=', $userId)
            ->get();

        return view('seller.dashboard', compact(
            'totalProducts',
            'totalShops',
            'clients'

        ));
    }



    public function mouvementStock(Request $request)
    {
        // Récupérer l'ID de l'utilisateur authentifié
        $userId = Auth::id();

        // Récupérer le vendeur associé à cet utilisateur
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller) {
            return response()->json(['error' => 'Vendeur non trouvé'], 404);
        }

        // ID du vendeur
        $sellerId = $seller->id;

        $period = $request->get('period');

        // Logique pour filtrer en fonction de la période
        switch ($period) {
            case 'day':
                $startDate = now()->startOfDay();
                $endDate = now()->endOfDay();
                break;
            case 'week':
                $startDate = now()->startOfWeek();
                $endDate = now()->endOfWeek();
                break;
            case 'month':
                $startDate = now()->startOfMonth();
                $endDate = now()->endOfMonth();
                break;
            default:
                return response()->json(['error' => 'Période invalide'], 400);
        }

        // Récupérer tous les magasins associés au vendeur
        $shops = Shop::where('seller_id', $sellerId)->get();


        $revenues = StockMovement::whereIn('stock_movements.shop_id', $shops->pluck('id'))
            ->whereBetween('stock_movements.created_at', [$startDate, $endDate])
            ->where('stock_movements.type', 'remove')
            ->where('stock_movements.raison', 'Expédition des commandes')
            ->join('products', 'stock_movements.product_id', '=', 'products.id')
            ->selectRaw('DATE(stock_movements.created_at) as date, sum(stock_movements.quantity * products.unit_price) as total_revenue')
            ->groupBy('date')
            ->get();


        $sales = StockMovement::whereIn('stock_movements.shop_id', $shops->pluck('id'))
            ->whereBetween('stock_movements.created_at', [$startDate, $endDate])
            ->where('stock_movements.type', 'remove')
            ->where('stock_movements.raison', 'Expédition des commandes')
            ->selectRaw('DATE(stock_movements.created_at) as date, sum(stock_movements.quantity) as total_sales')
            ->groupBy('date')
            ->get();

        // Organiser les données pour le graphique
        $data = [
            'revenues' => $revenues->pluck('total_revenue')->toArray(),
            'sales' => $sales->pluck('total_sales')->toArray(),
            'categories' => $revenues->pluck('date')->toArray(),
            'totalRevenue' => $revenues->sum('total_revenue'),
            'totalSales' => $sales->sum('total_sales')
        ];

        return response()->json($data);
    }



    public function getChartData(Request $request)
    {
        $user = Auth::user();
        $period = $request->query('period', 'This Week');
        $startDate = now();
        $endDate = now();

        // Déterminer les dates de début et de fin
        if ($period === 'This Week') {
            $startDate = now()->startOfWeek();
            $endDate = now()->endOfWeek();
        } elseif ($period === 'Last Week') {
            $startDate = now()->subWeek()->startOfWeek();
            $endDate = now()->subWeek()->endOfWeek();
        }

        $conversationIds = DB::table('wire_participants')
            ->where('participantable_id', $user->id)
            ->where('participantable_type', get_class($user)) // Vérifier le type polymorphique
            ->pluck('conversation_id');



        // Récupérer les messages en fonction des dates et des conversations
        $clientCounts = DB::table('wire_messages')
            ->whereIn('conversation_id', $conversationIds)
            ->where('sendable_id', '!=', $user->id) // Exclure les messages de l'utilisateur
            ->whereBetween('created_at', [$startDate, $endDate]) // Filtrer par période
            ->selectRaw('COUNT(DISTINCT sendable_id) as total_clients, DATE(created_at) as message_date')
            ->groupBy('message_date')
            ->orderBy('message_date')
            ->get();




        $categories = $clientCounts->pluck('message_date'); // Dates des messages
        $series = [
            [
                'name' => 'Nombre de Clients',
                'data' => $clientCounts->pluck('total_clients'), // Nombre total de clients par jour
            ],
        ];

        return response()->json([
            'categories' => $categories, // Catégories pour l'axe des X
            'series' => $series, // Séries pour le graphique
        ]);
    }


    public function getChartDataLocation()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user(); 
        
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non connecté'], 401);
        }
        // Récupérer les messages reçus par l'utilisateur connecté
        $messages = DB::table('wire_messages')
        ->join('wire_participants', 'wire_messages.conversation_id', '=', 'wire_participants.conversation_id')
        ->join('clients', 'wire_messages.sendable_id', '=', 'clients.user_id')
        ->join('locations', 'clients.location_id', '=', 'locations.id')
        ->where('wire_participants.participantable_id', $user->id) 
            ->where('wire_participants.participantable_type', get_class($user)) 
            ->select(
                'locations.country',
                'locations.latitude',
                'locations.longitude',
                DB::raw('SUM(1) as message_count') 
            )
            ->groupBy('locations.country', 'locations.latitude', 'locations.longitude')
            ->get();

        
        $mapData = $messages->map(function ($message) {
            return [
                'country' => $message->country,
                'latitude' => $message->latitude,
                'longitude' => $message->longitude,
                'message_count' => $message->message_count,
            ];
        });

        // Retourner les données pour la carte
        return response()->json($mapData);
    }

    public function getShopVisitors(Request $request)
    {
        $userId = Auth::id();

        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller) {
            return response()->json(['error' => 'Vendeur non trouvé'], 404);
        }


        $sellerId = $seller->id;
        $shops = Shop::where('seller_id', $seller->id)->get();
        $shopIds = $shops->pluck('id');

        // Default period is monthly
        $period = $request->input('period', 'monthly');

        // Validate period input
        if (!in_array($period, ['monthly', 'yearly'])) {
            return response()->json(['error' => 'Invalid period. Use "monthly" or "yearly".'], 400);
        }

        // Retrieve visits based on the selected period
        if ($period == 'monthly') {
            $visits = ShopVisit::whereIn('shop_id', $shopIds)
                ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as visits')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get();
        } else {
            $visits = ShopVisit::whereIn('shop_id', $shopIds)
                ->selectRaw('YEAR(created_at) as year, COUNT(*) as visits')
                ->groupBy('year')
                ->orderBy('year', 'desc')
                ->get();
        }

        // Return a response, or empty array if no visits
        return response()->json($visits->isEmpty() ? [] : $visits);
    }


    public function welcome()
    {
        $products = Product::all();
        $categories = CategoryProduct::all();
        return view('welcome', compact('products', 'categories'));
    }
}