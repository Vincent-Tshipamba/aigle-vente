<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $rowperpage = 25;


    public function home()
    {
        $rowperpage = $this->rowperpage;

        $totalProducts = Product::with('photos', 'shop.seller.user', 'shop.seller')->count();

        $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
            ->latest()
            ->skip(2)
            ->take($this->rowperpage)
            ->get();

        $firstMostRecentProduct = Product::with('photos', 'shop.seller.user', 'shop.seller')
            ->latest()
            ->first();

        $secondMostRecentProduct = Product::with('photos', 'shop.seller.user', 'shop.seller')
            ->latest()
            ->skip(1)
            ->first();

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
            return view('home.index', compact('products', 'firstMostRecentProduct', 'secondMostRecentProduct', 'rowperpage', 'totalProducts', 'categories', 'saleProducts', 'wishlists', 'totalAmount'));
        }

        return view('home.index', compact('products', 'firstMostRecentProduct', 'secondMostRecentProduct', 'rowperpage', 'totalProducts', 'categories', 'saleProducts'));
    }

    public function getProducts(Request $request)
    {
        $start = $request->get('start');

        $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
            ->latest()
            ->skip($start)
            ->take($this->rowperpage)
            ->get();

        $html = "";

        foreach ($products as $product) {
            $id = $product->id;
            $image = null;
            if ($product->photos->first()) {
                $image = $product->photos->first()->image;
            }
            $_id = $product->_id;
            $seller_id = $product->shop->seller->user->id;
            $name = $product->name;
            $shop = $product->shop->name;
            $seller_first_name = $product->shop->seller->first_name;
            $seller_last_name = $product->shop->seller->last_name;
            $unit_price = $product->unit_price;

            $html .= '
                <div class="col product">
                    <div class="tpproduct pb-15 mb-30">
                        <div class="tpproduct__thumb p-relative">
                            <a href="' . route('products.show', $_id) . '">
                                ' . ($image !== null ? '<img src="' . asset($image) . '" alt="' . $name . '">' : '') . '
                            </a>
                            <div class="tpproduct__thumb-action">
                                <a class="comphare" href="#" onclick="addToWishList(event, ' . $id . ')"><i class="fal fa-heart"></i></a>
                                <a class="quckview" href="/products/' . $_id . '"><i
                                        class="fal fa-eye"></i></a>

                                <!-- Button to send message -->
                                <a href="#" class="quckview message-button"
                                    data-seller-id="' . $seller_id . '"
                                    data-product-id="' . $id . '">
                                    <i class="fal fa-comment"></i>
                                </a>
                            </div>
                        </div>
                        <div class="tpproduct__content">
                            <h3 class="tpproduct__title"><a
                                    href="/products/' . $_id . '">' . $name . '</a>
                            </h3>
                            <p class="tpproduct__shop-name">Boutique ' . $shop . '</p>
                            <p class="tpproduct__title">Propriétaire
                                ' . $seller_first_name . ' ' . $seller_last_name . '
                            </p>
                            <div class="tpproduct__priceinfo p-relative">
                                <div class="tpproduct__priceinfo-list">
                                    <span>' . number_format($unit_price, 2, ",", " ") . '
                                        $</span>
                                </div>
                                <div class="tpproduct__cart">
                                    <a href="#" onclick="addToWishList(event, ' . $id . ')"><i class="fal fa-heart"></i>
                                        Ajouter à la liste des souhaits
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }

        return response()->json($html);
    }
}
