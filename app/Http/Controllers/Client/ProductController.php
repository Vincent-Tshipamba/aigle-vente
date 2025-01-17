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
    
    public function contactSeller($sellerId, $productId, Request $request)
    {
        $auth = auth()->user();

        // Récupérer le produit
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Désolé, le produit n\'est plus disponible malheureusement !');
        }

        // Récupérer le vendeur
        $seller = Seller::find($sellerId);
        if (!$seller) {
            return redirect()->back()->with('error', 'Désolé, le vendeur n\'est plus joignable malheureusement !');
        }

        $userSeller = $seller->user;

        $conversation = $auth->createConversationWith($userSeller);
        $message = $auth->sendMessageTo($conversation, $request->message);

        return redirect()->route('chat', $conversation->id);
    }

    public function filterProducts(Request $request)
    {
        $categories = $request->input('categories', []);

        // Fetch products based on selected categories
        if (empty($categories)) {
            $products = Product::with('photos', 'shop.seller.user', 'shop.seller')
                ->latest()
                ->get();
        } else {
            $products = Product::whereIn('category_product_id', $categories)->with('photos', 'shop.seller.user', 'shop.seller')->get();
        }

        // Generate HTML for the products
        $html = view('partials.home-partials.product-filter-results', compact('products'))->render();

        return response()->json(['html' => $html]);
    }

    public function show($id)
    {
        $userId = Auth::id();
        $product = Product::where('_id', $id)->with(['photos', 'stocks', 'shop.seller'])->firstOrFail();
        $otherProducts = Product::where('category_product_id', $product->category_product_id)
            ->where('_id', '!=', $product->_id)
            ->with(['photos', 'stocks', 'shop.seller'])
            ->get();

        return view('client.products.show', compact('product', 'otherProducts'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->get('value') . '%')
            ->with('shop.seller')
            ->latest()
            ->get();

        $totalSearchResults = $products->count();

        $html = '';

        if ($products->count() == 0) {
            $html .= '
                <div class="p-4 text-center justify-center w-[100%] mx-auto text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                    <span class="font-medium">Oups désolé !</span> Aucun produit disponible pour le moment. Essayez de rafraichir la page s\'il vous plait.
                </div>
            ';
        } else {
            foreach ($products as $index => $product) {
                $html .= '
                    <div class="w-72 rounded-xl duration-500">
                        <a href="' . route('products.show', $product->_id) . '">
                            <div class="image swiper-container product-swiper-' . ($index + 1) . '" loading="lazy">
                                <div class="swiper-wrapper">';

                foreach ($product->photos as $item) {
                    $html .= '
                                    <div class="swiper-slide">
                                        <img src="' . asset($item->image) . '" alt="' . $product->name . '" class="h-80 w-72 object-cover rounded-xl hover:scale-105">
                                    </div>';
                }

                $html .= '
                                </div>
                                <div class="swiper-pagination swiper-pagination-' . ($index + 1) . '"></div>
                                <div class="swiper-button-prev swiper-button-prev-' . ($index + 1) . '"></div>
                                <div class="swiper-button-next swiper-button-next-' . ($index + 1) . '"></div>
                            </div>
                        </a>
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">' . $product->category_product->name . '</span><br>
                            <span class="text-gray-400 mr-3 text-xs">Boutique ' . $product->shop->name . '</span>
                            <p class="text-lg font-bold text-black truncate block capitalize">' . $product->name . '</p>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">$' . $product->unit_price . '</p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$' . ($product->unit_price + 50) . '</p>
                                </del>
                                <div class="ml-auto flex space-x-2">
                                    <svg onclick="contactSellerModal(event, ' . htmlspecialchars(json_encode($product), ENT_QUOTES) . ')" class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                                    </svg>
                                    <svg onclick="addToWishList(event, ' . $product->id . ')" class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        }

        // Return the view with the generated HTML
        return response()->json(['html' => $html, 'rowperpage' => $this->rowperpage, 'totalSearchResults' => $totalSearchResults]);
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
                                ' . ($image !== null ? '<img loading="lazy" src="' . asset($image) . '" alt="' . $name . '">' : '') . '
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