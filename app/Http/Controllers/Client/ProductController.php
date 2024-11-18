<?php

namespace App\Http\Controllers\Client;

use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $rowperpage = 4;
    public function index(Request $request)
    {
        $categories = CategoryProduct::latest()->get();

        $rowperpage = $this->rowperpage;
        $totalProducts = Product::with('photos', 'shop.seller.user', 'shop.seller')->count();
        $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
            ->latest()
            ->take($this->rowperpage)
            ->get();
        $saleProducts = $products->filter(function ($product) {
            return $product->promotions->isNotEmpty();
        });

        return view('partials.home-partials.product', compact('rowperpage', 'saleProducts', 'totalProducts', 'products'));
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