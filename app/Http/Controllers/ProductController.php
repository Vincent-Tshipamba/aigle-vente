<?php

namespace App\Http\Controllers;


use App\Models\Shop;
use App\Models\Stock;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductState;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

   public function index(Shop $shop, Request $request)
{
    $userId = Auth::id();
    $seller = Seller::where('user_id', $userId)->first();

    // Vérifier que la boutique appartient au vendeur connecté
    if (!$seller || $shop->seller_id !== $seller->id) {
        return abort(403, 'Accès interdit.');
    }

    $query = Product::where('shop_id', $shop->id);

    // Filtrage des produits
    if ($request->has('filter')) {
        if ($request->filter == 'is_active') {
            $query->where('is_active', true);
        } elseif ($request->filter == 'recent') {
            $query->orderBy('created_at', 'desc');
        }
    }

    $products = $query->paginate(10);
    $stocks = Stock::whereIn('product_id', $products->pluck('id'))->get();
    $categories = CategoryProduct::all();

    // Gestion des requêtes AJAX
    if ($request->ajax()) {
        return response()->json([
            'products' => view('seller.produits.index', compact('products', 'stocks', 'categories', 'shop'))->render()
        ]);
    }

    return view('seller.produits.index', compact('products', 'categories', 'shop', 'stocks'));
}


    public function fetchProducts(Shop $shop,Request $request)
    {
        $query = Product::query()->with('category_product','stocks','shop','photos');


        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filtrer par produits actifs
        if ($request->has('is_active')) {
            $query->where('is_active', true);
        }


        if ($request->has('recent')) {
            $query->where('created_at', '>=', now()->subDays(30));
        }

        $products = $query->paginate(10);

        return response()->json([
            'products' => $products
        ]);
    }

    public function toggleStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->is_active = !$product->is_active;
        $product->save();

        return redirect()->back()->with('success', 'Statut du produit mis à jour avec succès.');
    }


    public function manageStockIndex($id)
    {
        $product = Product::where('_id', $id)->first();

        if (!$product) {
            return response()->json(['error' => 'Produit introuvable.'], 404);
        }

        $stocks = $product->stocks;
        return view('seller.manage-stocks.index', compact('product', 'stocks'));
    }



    public function manageStock(Request $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:add,remove',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255',
        ]);

        $shop = $product->shop->id;

        $product->recordStockMovement(
            $request->type,
            $request->quantity,
            $request->reason,
            Auth::id(),
            $shop
        );

        return redirect()->route('stocks.edit', $product->_id)->with('success', 'Stock updated successfully.');
    }


    public function create(Shop $shop)
    {

        $userId = Auth::id();

        // Récupérer le vendeur lié à cet utilisateur
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller || !$seller->shops()->where('id', $shop->id)->exists()) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }
        $categories = CategoryProduct::all();
        $state = ProductState::all();
        return view('seller.produits.create', compact('categories', 'state', 'shop'));
    }

    public function store(Request $request, Shop $shop)
    {

        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'stock_quantity' => 'required|integer',
                'price' => 'required|numeric',
                'category_product_id' => 'required|exists:category_products,id',
                'description' => 'nullable|string',
                'media.*' => 'required|file|mimes:jpeg,png,jpg,gif,webp,mp4,mov,avi|max:20480',
                'weight' => 'nullable|numeric',
                'dimensions' => 'nullable|string|max:255',
                'color' => 'nullable|string|max:50',
                'size' => 'nullable|string|max:50',
                'model' => 'nullable|string|max:50',
                'shipping' => 'nullable|string|max:255',
                'care' => 'nullable|string|max:255',
                'brand' => 'nullable|string|max:50',
            ], );

            // Ajout de l'ID de la boutique
            $validated['shop_id'] = $shop->id;

            // Création du produit
            $product = Product::create([
                'name' => $validated['name'],
                'unit_price' => $validated['price'],
                'category_product_id' => $validated['category_product_id'],
                'description' => $validated['description'],
                'shop_id' => $validated['shop_id'],
                'product_state_id' => $request->state,
            ]);

            if (!$product) {
                Log::error('Le produit n\'a pas été créé.');
                return redirect()->back()->with('error', 'Le produit n\'a pas pu être créé.')->withInput();
            }




            $productDetail = ProductDetail::create([
                'weight' => $validated['weight'] ?? null,
                'dimensions' => $validated['dimensions'] ?? null,
                'color' => $validated['color'] ?? null,
                'size' => $validated['size'] ?? null,
                'model' => $validated['model'] ?? null,
                'shipping' => $validated['shipping'] ?? null,
                'care' => $validated['care'] ?? null,
                'brand' => $validated['brand'] ?? null,
                'product_id' => $product->id,
            ]);

            if (!$productDetail) {
                Log::error('Le produit n\'a pas été créé.');
                return redirect()->back()->with('error', 'Le produit n\'a pas pu être créé.')->withInput();
            }

            // Ajout du stock
            $product->stocks()->create([
                'quantity' => $validated['stock_quantity'],
            ]);

            if ($request->hasFile('media')) {
                foreach ($request->file('media') as $mediaFile) {
                    // Générer un nom unique pour le fichier
                    $mediaName = uniqid() . '.' . $mediaFile->getClientOriginalExtension();
                    $path = $mediaFile->move(public_path('products_media'), $mediaName);

                    // Sauvegarder le chemin correct dans la base de données
                    $product->photos()->create([
                        'image' => 'products_media/'.$mediaName,
                        'description' => 'Media pour ' . $product->name,
                    ]);
                }
            }


            DB::commit();

            return redirect()->route('seller.shops.products.index', $product->shop->_id)
                ->with('success', 'Produit créé avec succès !');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erreurs de validation: ', $e->errors());
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du produit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du produit : ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $userId = Auth::id();

        // Récupérer le vendeur lié à cet utilisateur
        $seller = Seller::where('user_id', $userId)->first();
        $product = Product::where('_id', $id)->with(['photos', 'stocks'])->firstOrFail();

        if ($seller) {
            return view('seller.produits.show', compact('product'));
        }

        $otherProducts = Product::where('category_product_id', $product->category_product_id)
            ->where('_id', '!=', $product->_id)
            ->with(['photos', 'stocks'])
            ->get();

        return view('client.products.show', compact('product', 'otherProducts'));
    }

    public function edit(Shop $shop, Product $product)
    {

        if ($shop->id !== $product->shop_id) {
            abort(403, 'Vous n\'avez pas accès à ce produit.');
        }

        $product = Product::where('_id', $product->_id)->with(['photos', 'stocks'])->firstOrFail();
        $categories = CategoryProduct::all();
        $state = ProductState::all();
        return view('seller.produits.edit', [
            'shop' => $shop,
            'product' => $product,
            'categories' => $categories,
            'state' => $state
        ]);
    }

    public function update(Request $request, Shop $shop, Product $product)
    {
        try {
            // Validation des données
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'category_product_id' => 'required|exists:category_products,id',
                'description' => 'nullable|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'weight' => 'nullable|numeric',
                'dimensions' => 'nullable|string|max:255',
                'color' => 'nullable|string|max:50',
                'size' => 'nullable|string|max:50',
                'model' => 'nullable|string|max:50',
                'shipping' => 'nullable|string|max:255',
                'care' => 'nullable|string|max:255',
                'brand' => 'nullable|string|max:50',
            ]);

            // Mise à jour des informations principales du produit
            $product->update([
                'name' => $validated['name'],
                'unit_price' => $validated['price'],
                'category_product_id' => $validated['category_product_id'],
                'description' => $validated['description'],
                'product_state_id' => $request->state,
            ]);

            // Mise à jour ou création des détails du produit
            $productDetail = $product->details()->firstOrNew();
            $productDetail->fill([
                'weight' => $validated['weight'] ?? null,
                'dimensions' => $validated['dimensions'] ?? null,
                'color' => $validated['color'] ?? null,
                'size' => $validated['size'] ?? null,
                'model' => $validated['model'] ?? null,
                'shipping' => $validated['shipping'] ?? null,
                'care' => $validated['care'] ?? null,
                'brand' => $validated['brand'] ?? null,
            ]);
            $productDetail->save();



            /// Gestion des images
            if ($request->hasFile('images')) {
                // 🔴 Supprimer les anciennes images du dossier public/products_media/
                foreach ($product->photos as $photo) {
                    $oldImagePath = public_path($photo->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Supprime physiquement le fichier
                    }
                    $photo->delete(); // Supprime l'entrée en base de données
                }

                // 🟢 Ajouter les nouvelles images
                foreach ($request->file('images') as $imageFile) {
                    $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
                    $path=$imageFile->move(public_path('products_media'), $imageName); // Déplace l'image dans public/products_media/

                    $product->photos()->create([
                        'image' => 'products_media/'. $imageName,
                        'description' => 'Image pour ' . $product->name,
                    ]);
                }
            }
            return redirect()->route('seller.shops.products.index', $product->shop->_id)
                ->with('success', 'Produit mis à jour avec succès !');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erreurs de validation: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du produit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour du produit : ' . $e->getMessage())->withInput();
        }
    }

    // Méthode de suppression d'un produit
    public function destroy(Product $product)
    {
        $seller = Auth::user()->seller;

        // if (!$seller || !$seller->shops->contains($product->shop)) {
        //     return response()->json(['error' => 'Accès non autorisé à ce produit.'], 403);
        // }

        // Suppression du produit et des relations associées
        $product->photos()->delete();
        $product->stocks()->delete();
        $product->delete();

        return redirect()->back()->with('success', 'Produit supprimé avec succès !');
    }
    public function requestPromotion(Request $request, Product $product)
    {
        $seller = Auth::user()->seller;

        // Vérifier si le produit appartient bien à une boutique du vendeur connecté
        if (!$seller || !$seller->shops->contains($product->shop)) {
            return response()->json(['error' => 'Accès non autorisé à ce produit.'], 403);
        }

        // Validation des données de la demande de promotion
        $validated = $request->validate([
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'promotion_duration' => 'required|integer|min:1', // Durée en jours
        ], [
            'discount_percentage.required' => 'Veuillez fournir un pourcentage de réduction.',
            'promotion_duration.required' => 'Veuillez spécifier la durée de la promotion.',
        ]);

        try {
            // Logique pour gérer la demande de promotion
            // Ici, vous pouvez enregistrer cette demande dans une table dédiée ou envoyer un email de demande

            // Exemple d'enregistrement d'une promotion
            $product->promotions()->create([
                'discount_percentage' => $validated['discount_percentage'],
                'promotion_duration' => $validated['promotion_duration'],
                'status' => 'pending', // Statut initial de la demande
            ]);

            return redirect()->route('seller.shops.products.index', $product->shop->_id)
                ->with('success', 'Demande de promotion envoyée avec succès !');

        } catch (\Exception $e) {
            // Gestion des erreurs
            Log::error('Erreur lors de la demande de promotion : ' . $e->getMessage());
            return response()->json(['error' => 'Une erreur est survenue lors de la demande de promotion.'], 500);
        }
    }

    public function deleteImage(Request $request, Product $product, $photoId)
    {
        try {
            // Trouver l'image en base de données
            $photo = $product->photos()->findOrFail($photoId);

            // Supprimer l'image du stockage
            $imagePath = 'public/' . $photo->image; // Le chemin de l'image stockée
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath); // Suppression du fichier
            }

            // Supprimer l'entrée en base de données
            $photo->delete();

            return redirect()->back()->with('success', 'Image supprimée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'image.');
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $activites = Product::where('name', 'LIKE', "%{$searchTerm}%")->with('category_product')
            ->take(20)
            ->latest()
            ->get();




        return response()->json($activites);
    }
}