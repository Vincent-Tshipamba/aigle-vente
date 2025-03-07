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

    public function filtersProducts(Request $request)
    {
        // Récupérer les filtres depuis la requête
        $locations = $request->input('locations', []); // Localisation des vendeurs
        $categories = $request->input('categories', []); // Catégories des produits
        $minPrice = $request->input('min_price', 0); // Prix minimum
        $maxPrice = $request->input('max_price', 1000); // Prix maximum

        // Commencer la requête pour récupérer les produits
        $query = Product::with('photos', 'shop.seller.user', 'shop.seller');

        // Filtrer par prix, si des valeurs sont fournies
        if ($minPrice || $maxPrice) {
            $query->whereBetween('unit_price', [$minPrice, $maxPrice]);
        }

        // Filtrer par catégorie, si des catégories sont sélectionnées
        if (!empty($categories)) {
            $query->whereIn('category_product_id', $categories);
        }

        // Filtrer par localisation des vendeurs (si cette option est sélectionnée)
        if (!empty($locations)) {
            $query->join('shops', 'shops.id', '=', 'products.shop_id')
                ->join('sellers', 'sellers.id', '=', 'shops.seller_id')
                ->join('locations', 'locations.id', '=', 'sellers.location_id');

            // Si les vendeurs locaux sont sélectionnés
            if (in_array('localSellers', $locations)) {
                $query->where(function ($query) {
                    $query->where('locations.country', 'LIKE', '%République démocratique du Congo%')
                        ->orWhere('locations.country', 'LIKE', '%Congo (la République démocratique du)%');
                });
            }

            // Si les vendeurs internationaux sont sélectionnés
            if (in_array('internationalSellers', $locations)) {
                $query->where(function ($query) {
                    $query->where('locations.country', '!=', 'République démocratique du Congo')
                        ->where('locations.country', '!=', 'Congo (la République démocratique du)');
                });
            }
        }

        // Exécuter la requête et obtenir les résultats
        $products = $query->get();

        // Générer le HTML pour les produits filtrés
        $html = view('partials.home-partials.product-filter-results', compact('products'))->render();

        // Retourner la réponse JSON avec le HTML mis à jour
        return response()->json(['html' => $html]);
    }

    public function filterProductsByCategory(Request $request)
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
            ->orWhereHas('shop', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->get('value') . '%');
            })
            ->with('shop.seller')
            ->latest()
            ->get();

        $totalSearchResults = $products->count();

        $html = '';

        if ($products->count() > 0) {
            foreach ($products as $index => $product) {
                $html .= '
                    <div class="rounded-xl w-72 duration-500">
                        <a href="' . route('products.show', $product->_id) . '">
                            <div class="image swiper-container product-swiper-' . ($index + 1) . '" loading="lazy">
                                <div class="swiper-wrapper">';

                foreach ($product->photos as $item) {
                    $html .= '
                                    <div class="swiper-slide">
                                        <img src="' . asset($item->image) . '" alt="' . $product->name . '" class="rounded-xl w-72 h-80 object-cover hover:scale-105">
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
                            <span class="mr-3 text-gray-400 text-xs uppercase">' . $product->category_product->name . '</span><br>
                            <span class="mr-3 text-gray-400 text-xs">Boutique ' . $product->shop->name . '</span>
                            <p class="block font-bold text-black text-lg truncate capitalize">' . $product->name . '</p>
                            <div class="flex items-center">
                                <p class="my-3 font-semibold text-black text-lg cursor-auto">$' . $product->unit_price . '</p>
                                <del>
                                    <p class="ml-2 text-gray-600 text-sm cursor-auto">$' . ($product->unit_price + 50) . '</p>
                                </del>
                                <div class="flex space-x-2 ml-auto">
                                    <svg onclick="contactSellerModal(event, ' . htmlspecialchars(json_encode($product), ENT_QUOTES) . ')" class="hover:fill-[#e38407] w-8 h-8 text-gray-800 hover:text-[#e38407] dark:text-white hover:cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                                    </svg>
                                    <svg onclick="addToWishList(event, ' . $product->id . ')" class="hover:fill-[#e38407] w-8 h-8 text-gray-800 hover:text-[#e38407] dark:text-white hover:cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
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
                    <div class="mb-30 pb-15 tpproduct">
                        <div class="p-relative tpproduct__thumb">
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
                            <div class="p-relative tpproduct__priceinfo">
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
