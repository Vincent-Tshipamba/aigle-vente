<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $client = Client::where('_id', Auth::user()->client->_id)->first();
        $recentOrders = Order::where('client_id', $client->id)->get();
        $totalProductsInWishlist = 0;

        return view('client.dashboard', compact('totalProductsInWishlist', 'client', 'recentOrders'));
    }

    public function getOrdersWishlistByPeriod(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $query = Client::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
        ->whereYear('created_at', $year);


        if ($month && $month !== 'all') {
            $query->whereMonth('created_at', $month);
        }

        $orders = $query->groupBy('date')->get();

        return response()->json($orders);
    }

    public function wishlist()
    {
        return view('client.wishlist');
    }

    public function orders()
    {
        return view('client.orders');
    }
}