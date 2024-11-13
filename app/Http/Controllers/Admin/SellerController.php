<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::latest()->get();
        return view('admin.sellers.index', compact('sellers'));
    }


    public function changeSellerStatus(Request $request)
    {
        $seller = Seller::find($request->sellerId);
        $isActive = $request->isActive == 'true' ? true : false;
        $seller->is_active = $isActive;
        $seller->save();
        return response()->json(['message' => 'Status du vendeur mis à jour avec succès']);
    }

    public function getOrdersBySeller(Request $request)
    {
        $seller_id = $request->seller_id;
        $year = $request->year;
        $month = $request->month;
        $query = DB::table('orders')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->join('shops', 'products.shop_id', '=', 'shops.id')
            ->join('sellers', 'shops.seller_id', '=', 'sellers.id')
            ->selectRaw("date_format(orders.created_at, '%Y-%m-%d') as date, count(*) as aggregate")
            ->where('sellers.id', $seller_id)
            ->whereYear('orders.created_at', $year);

        if ($month && $month !== 'all') {
            $query->whereMonth('orders.created_at', $month);
        }

        $orders = $query->groupBy('date')->get();

        return response()->json($orders);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Seller $seller)
    {
        return view('admin.sellers.show', compact('seller'));
    }


    public function edit(Seller $seller)
    {
        //
    }

    public function update(Request $request, Seller $seller)
    {
        //
    }

    public function destroy(Seller $seller)
    {
        //
    }
}