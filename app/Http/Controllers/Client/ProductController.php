<?php

namespace App\Http\Controllers\Client;

use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
            ->latest()
            ->paginate(20, ['*'], 'page', $page);

        return response()->json($products);
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