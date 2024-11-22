<?php

namespace App\Http\Controllers\Client;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $rowperpage = 15;
    
    public function index(Request $request)
    {
        $rowperpage = $this->rowperpage;
        $totalProducts = Product::with('photos', 'shop.seller.user', 'shop.seller')->count();
        $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
        ->latest()
            ->skip(0)
            ->take($this->rowperpage)
            ->get();
        $categories = CategoryProduct::latest()->get();

        $saleProducts = $products->filter(function ($product) {
            return $product->promotions->isNotEmpty();
        });

        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
            $totalAmount = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('user_id', Auth::user()->id)
                ->sum('products.unit_price');

            // Retourner la vue avec les produits
            return view('client.products.index', compact('products', 'rowperpage', 'totalProducts', 'categories', 'saleProducts', 'wishlists', 'totalAmount'));
        }

        return view('client.products.index', compact('rowperpage', 'saleProducts', 'totalProducts', 'products', 'categories'));
    }

    public function show($id)
    {
        $userId = Auth::id();
        $product = Product::where('_id', $id)->with(['photos', 'stocks'])->firstOrFail();
        $otherProducts = Product::where('category_product_id', $product->category_product_id)
            ->where('_id', '!=', $product->_id)
            ->with(['photos', 'stocks'])
            ->get();

        return view('client.products.show', compact('product', 'otherProducts'));
    }
}