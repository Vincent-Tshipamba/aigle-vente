<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Shop $shop)
    {
        return view('admin.shops.show', compact('shop'));
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