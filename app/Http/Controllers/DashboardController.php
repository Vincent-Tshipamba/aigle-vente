<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockMovement;
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

        // Récupérer les mouvements de stock pour les magasins du vendeur
        $revenues = StockMovement::whereIn('stock_movements.shop_id', $shops->pluck('id')) // Spécifier stock_movements.shop_id
            ->whereBetween('stock_movements.created_at', [$startDate, $endDate])
            ->join('products', 'stock_movements.product_id', '=', 'products.id')
            ->selectRaw('DATE(stock_movements.created_at) as date, sum(stock_movements.quantity * products.unit_price) as total_revenue')
            ->groupBy('date')
            ->get();

        $sales = StockMovement::whereIn('stock_movements.shop_id', $shops->pluck('id')) // Spécifier stock_movements.shop_id
            ->whereBetween('stock_movements.created_at', [$startDate, $endDate])
            ->join('products', 'stock_movements.product_id', '=', 'products.id')
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
}
