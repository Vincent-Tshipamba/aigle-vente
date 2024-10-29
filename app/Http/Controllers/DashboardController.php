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
            return redirect()->back()->withErrors('Vendeur non trouvé.');
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

        $topProducts = DB::table('order_products')
        ->join('products', 'products._id', '=', 'order_products.product_id')
        ->whereIn('products.shop_id', $shopIds)
            ->select('products.name', DB::raw('SUM(order_products.quantity) as total_quantity'))
            ->groupBy('products.name')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        $monthlySales = DB::table('orders')
        ->join('order_products', 'orders._id', '=', 'order_products.order_id')
        ->join('products', 'products._id', '=', 'order_products.product_id')
        ->where('orders.seller_id', $seller->id) // Utiliser `seller_id` ici aussi
            ->select(
                DB::raw('MONTH(orders.created_at) as month'),
                DB::raw('COUNT(*) as total_sales'),
                DB::raw('SUM(order_products.quantity * products.unit_price) as monthly_revenue')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $totalStockQuantity = Product::whereIn('shop_id', $shopIds)->sum('stock_quantity');
        $totalShops = $shopIds->count();

        return view('seller.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'averageOrderValue',
            'topProducts',
            'monthlySales',
            'totalStockQuantity',
            'totalShops'
        ));
    }



    // Obtenir les statistiques de vente pour un vendeur spécifique
    public function salesStatistics(Seller $seller)
    {
        $totalSales = DB::table('order_products')
            ->join('orders', 'orders._id', '=', 'order_products.order_id')
            ->join('products', 'products._id', '=', 'order_products.product_id')
            ->whereIn('products.shop_id', $seller->shops->pluck('_id'))
            ->sum(DB::raw('order_products.quantity * products.unit_price'));

        return response()->json(['total_sales' => $totalSales]);
    }

    // Obtenir le nombre de commandes pour chaque produit d'un vendeur
    public function orderStatistics(Seller $seller)
    {
        $orders = DB::table('order_products')
            ->join('products', 'products._id', '=', 'order_products.product_id')
            ->whereIn('products.shop_id', $seller->shops->pluck('_id'))
            ->select('products.name', DB::raw('SUM(order_products.quantity) as total_quantity'))
            ->groupBy('products.name')
            ->orderByDesc('total_quantity')
            ->get();

        return response()->json($orders);
    }
}
