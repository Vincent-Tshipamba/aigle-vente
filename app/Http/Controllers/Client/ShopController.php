<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Shop;

class ShopController extends Controller{
    public function index(){
        $shops = Shop::paginate(20);
        return view('client.shops.index',compact('shops'));
    }
}