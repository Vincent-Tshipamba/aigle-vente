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

    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->get('value') . '%')
            ->latest()
            ->get();

        $totalSearchResults = $products->count();

        $html = '';

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
        return response()->json([
            'html' => $html,
            'rowperpage' => $this->rowperpage,
            'totalSearchResults' => $totalSearchResults
        ]);
    }

    public function getSearchProducts(Request $request)
    {
        $start = $request->get('start');

        $products = Product::where('name', 'LIKE', '%' . $request->get('value') . '%')
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