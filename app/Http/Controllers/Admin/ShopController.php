<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
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
        $orders = DB::table('orders')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->where('products.shop_id', $shop->id)
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