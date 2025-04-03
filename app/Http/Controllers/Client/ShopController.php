<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Shop;

class ShopController extends Controller{
    public function index(){
        $shops = Shop::with('seller')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('client.shops.index',compact('shops'));
    }
}
