<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::with('shop.seller')->get();

        $saleProducts = $products->filter(function ($product) {
            return $product->promotions->isNotEmpty();
        });

        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        $totalAmount = DB::table('wishlists')
        ->join('products', 'wishlists.product_id', '=', 'products.id')
        ->where('user_id', Auth::user()->id)
            ->sum('products.unit_price');

        // Retourner la vue avec les produits
        return view('home.index', compact('products', 'saleProducts', 'wishlists', 'totalAmount'));
    }

}