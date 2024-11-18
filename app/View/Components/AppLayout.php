<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppLayout extends Component
{
    private $rowperpage = 20;
    public function render(): View
    {
        $rowperpage = $this->rowperpage;
        $totalProducts = Product::with('photos', 'shop.seller.user', 'shop.seller')->count();
        $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
        ->latest()
            ->take($this->rowperpage)
            ->get();

        $saleProducts = $products->filter(function ($product) {
            return $product->promotions->isNotEmpty();
        });

        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
            $totalAmount = DB::table('wishlists')
                ->join('products', 'wishlists.product_id', '=', 'products.id')
                ->where('user_id', Auth::user()->id)
                ->sum('products.unit_price');

            return view('layouts.app', compact('products', 'rowperpage', 'totalProducts', 'saleProducts', 'wishlists', 'totalAmount'));
        }

        return view('layouts.app', compact('products', 'saleProducts'));
    }
}