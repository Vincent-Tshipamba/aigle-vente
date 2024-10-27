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
        // Obtenir le vendeur connecté
        $seller = Auth::user()->seller;

        if (!$seller) {
            return redirect()->back()->withErrors('Vendeur non trouvé.');
        }

        
        $shopIds = $seller->shops->pluck('_id');
        $totalProducts = Product::whereIn('shop_id', $shopIds)->count();

        // Nombre total de commandes pour ce vendeur
        $totalOrders = DB::table('orders')
            ->whereIn('shop_id', $shopIds)
            ->count();

        // Revenu total pour le vendeur
        $totalRevenue = DB::table('order_products')
            ->join('products', 'products._id', '=', 'order_products.product_id')
            ->whereIn('products.shop_id', $shopIds)
            ->sum(DB::raw('order_products.quantity * products.unit_price'));

        // Revenu moyen par commande pour ce vendeur
        $averageOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

        // Produits les plus vendus par ce vendeur
        $topProducts = DB::table('order_products')
            ->join('products', 'products._id', '=', 'order_products.product_id')
            ->whereIn('products.shop_id', $shopIds)
            ->select('products.name', DB::raw('SUM(order_products.quantity) as total_quantity'))
            ->groupBy('products.name')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        // Ventes et revenus mensuels pour ce vendeur
        $monthlySales = DB::table('orders')
            ->whereIn('shop_id', $shopIds)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_sales'), DB::raw('SUM(total_amount) as monthly_revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Stock total des produits pour ce vendeur
        $totalStockQuantity = Product::whereIn('shop_id', $shopIds)->sum('stock_quantity');

        // Ventes par catégorie de produit pour ce vendeur
        $salesByCategory = DB::table('order_products')
            ->join('products', 'products._id', '=', 'order_products.product_id')
            ->join('category_products', 'category_products._id', '=', 'products.category_produit_id')
            ->whereIn('products.shop_id', $shopIds)
            ->select('category_products.name as category', DB::raw('SUM(order_products.quantity * products.unit_price) as total_sales'))
            ->groupBy('category')
            ->orderByDesc('total_sales')
            ->get();

        $totalShops = $shopIds->count();

        return view('seller.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'averageOrderValue',
            'topProducts',
            'monthlySales',
            'totalStockQuantity',
            'salesByCategory',
            'totalShops',
            'totalSellers'
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
