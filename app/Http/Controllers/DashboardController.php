<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtenir l'utilisateur connecté
        $userId = Auth::id();

        // Récupérer le vendeur lié à cet utilisateur
        $seller = Seller::where('user_id', $userId)->first();
        if (!$seller) {
            return view('client.dashboard');
        }

        // Récupérer les boutiques associées à ce vendeur
        $shopIds = $seller->shops()->pluck('_id'); // Assurez-vous que cela correspond aux boutiques

        // Compter les produits du vendeur
        $totalProducts = Product::whereIn('shop_id', $shopIds)->count();

        // Compter les commandes associées au vendeur en utilisant le `seller_id` dans `orders`
        $totalOrders = DB::table('orders')
            ->where('seller_id', $seller->id) // Remplacez `shop_id` par `seller_id` ou la clé correcte
            ->count();

        // Calcul du revenu total basé sur les produits du vendeur
        $totalRevenue = DB::table('order_products')
            ->join('products', 'products._id', '=', 'order_products.product_id')
            ->whereIn('products.shop_id', $shopIds)
            ->sum(DB::raw('order_products.quantity * products.unit_price'));

        $averageOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;



        // $totalStockQuantity = Product::whereIn('shop_id', $shopIds)->sum('stock_quantity');
        $totalShops = $shopIds->count();


        // Calcul des ventes mensuelles
        $monthlySales = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_orders')) // Compte le nombre total de commandes par mois
            ->where('seller_id', $seller->id) // Filtrer par vendeur si nécessaire
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $months = [];
        $ordersCount = [];

        foreach ($monthlySales as $sale) {
            $months[] = $sale->month; 
            $ordersCount[] = $sale->total_orders; 
        }

        return view('seller.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'averageOrderValue',
            'totalShops',
            'months', 
            'ordersCount' 
        ));
    }
}