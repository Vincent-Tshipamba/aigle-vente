<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSellers = Seller::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalShops = Shop::count();

        // $seller = Auth::user()->seller;
        // $sellerOrders = $seller ? $seller->shops()->with('orders')->get()->pluck('orders')->flatten() : [];

        // Exemple de revenus totaux
        $totalRevenue = Order::sum('order_number');

        return view('seller.dashboard',compact('totalRevenue','totalShops', 'totalSellers', 'totalOrders'));
    }
}
