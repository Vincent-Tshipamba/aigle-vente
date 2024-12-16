<?php

namespace App\Http\Controllers\Client;

use App\Models\Message;
use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $client = Client::where('_id', Auth::user()->client->_id)->first();
        $recentWishlistProducts = Wishlist::where('user_id', Auth::user()->id)->get();
        $totalProductsInWishlist = 0;

        return view('client.dashboard', compact('totalProductsInWishlist', 'client', 'recentWishlistProducts'));
    }

    public function getClientWishlistByPeriod(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $query = Wishlist::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
            ->where('user_id', Auth::user()->id)
            ->whereYear('created_at', $year);


        if ($month && $month !== 'all') {
            $query->whereMonth('created_at', $month);
        }

        $wishlist = $query->groupBy('date')->get();

        return response()->json(data: $wishlist);
    }

    public function getClientContactedSellersByPeriod(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $query = Message::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
            ->where('sender_id', Auth::user()->id)
            ->whereYear('created_at', $year);


        if ($month && $month !== 'all') {
            $query->whereMonth('created_at', $month);
        }

        $contactedSellers = $query->groupBy('date')->get();

        return response()->json(data: $contactedSellers);
    }

    public function wishlist()
    {
        return view('client.wishlist');
    }

    public function orders()
    {
        $client_id = Auth::user()->client->id;
        $orders = Order::where('client_id', $client_id)->get();

        return view('client.orders', compact('orders'));
    }
}
