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

        if ($minPrice > $maxPrice) {
            return response()->json(['error' => 'Le prix minimum ne peut pas être supérieur au prix maximum.'], 400);
        }

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

    $html = view('components.product-card', compact('products'))->render();

    return response()->json(['html' => $html, 'totalSearchResults' => $totalSearchResults]);
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