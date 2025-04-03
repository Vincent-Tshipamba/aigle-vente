<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // private $rowperpage = 25;

    public function home(Request $request)
    {
        $totalProducts = Product::with('photos', 'shop.seller.user', 'shop.seller')->count();

        $products = Product::with(['photos', 'stocks', 'shop.seller'])
            ->where('is_active', true)
            ->inRandomOrder();

        if ($request->ajax()) {
            $query = $products->paginate(30);
            return response()->json([
                'html' => view('components.product-card', ['products' => $query])->render()
            ]);
        }

        $products = $products->paginate(30);

        $categories = CategoryProduct::inRandomOrder()->get();

        $saleProducts = $products->filter(function ($product) {
            return $product->promotions->isNotEmpty();
        });

        $promotion = Promotion::where('status', 'active')
            ->latest()
            ->first();

        $promotions = Promotion::where('status', 'active')
            ->latest()->get();

        if (Auth::check()) {
            $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
            $totalAmount = DB::table('wishlists')
                ->join('products', 'wishlists.product_id', '=', 'products.id')
                ->where('user_id', Auth::user()->id)
                ->sum('products.unit_price');

            // Retourner la vue avec les produits
            return view('home.index', compact('products', 'totalProducts', 'categories', 'saleProducts', 'wishlists', 'totalAmount', 'promotion', 'promotions'));
        }

        return view('home.index', compact('products', 'totalProducts', 'categories', 'saleProducts', 'promotion', 'promotions'));
    }
}
