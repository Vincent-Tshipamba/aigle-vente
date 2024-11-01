<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::latest()->get();
        return view('admin.shops.index', compact('shops'));
    }

    public function getOrdersFlow(Request $request)
    {
        $shop_id = $request->shop_id;
        $year = $request->year;
        $month = $request->month;

        $query = Order::with('products')
            ->whereHas('products', function ($q) use ($shop_id) {
                $q->where('shop_id', $shop_id);
            })
            ->whereYear('created_at', $year);

        if ($month && $month !== 'all') {
            $query->whereMonth('created_at', $month);
        }

        $orders = $query->selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, COUNT(*) as aggregate")
            ->groupBy('date')
            ->get();

        return response()->json($orders);
    }

    public function changeShopStatus(Request $request)
    {
        $shop = Shop::find($request->shopId);
        $isActive = $request->isActive == 'true' ? true : false;
        $shop->is_active = $isActive;
        $shop->save();
        return response()->json(['message' => 'Status de la boutique mis à jour avec succès']);
    }

    public function show(Shop $shop)
    {
        $owner = Seller::find($shop->seller_id);
        $products = Product::where('shop_id', $shop->id)->get();

        $orders = Order::with(['products', 'client'])
            ->whereHas('products', function ($query) use ($shop) {
                $query->where('shop_id', $shop->id);
            })
            ->get();

        return view('admin.shops.show', compact('shop', 'owner', 'products', 'orders'));
    }

    public function edit(Shop $shop)
    {
        //
    }

    public function update(Request $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}