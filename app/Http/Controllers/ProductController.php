<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\ProductDetail;
use App\Models\ProductState;
use App\Models\Stock;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index(Shop $shop)
    {
        $userId = Auth::id();


        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller || !$seller->shops()->where('id', $shop->id)->exists()) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        $products = $shop->products()->paginate(10);
        $stocks = Stock::all();

        $categories = CategoryProduct::All();


        return view('seller.produits.index', compact('products', 'categories', 'shop', 'stocks'));
    }

    public function manageStockIndex ($id){
        $product = Product::where('_id', $id)->first();

        if (!$product) {
            return response()->json(['error' => 'Produit introuvable.'], 404);
        }

        $stocks = $product->stocks; // Accès au stock actuel
        return view('seller.manage-stocks.index', compact('product', 'stocks'));
    }

    public function manageStock(Request $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:add,remove',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255',
        ]);

        $shop= $product->shop->id;

        $product->recordStockMovement(
            $request->type,
            $request->quantity,
            $request->reason,
            auth()->id(),
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
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'stock_quantity' => 'required|integer',
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
            ],);

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



            // Création des détails du produit
           ProductDetail::create([
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

            // Ajout du stock
            $product->stocks()->create([
                'quantity' => $validated['stock_quantity'],
            ]);

            // Gestion des images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $path = $imageFile->store('images', 'public');

                    $product->photos()->create([
                        'image' => $path,
                        'description' => 'Image pour ' . $product->name,
                    ]);
                }
            }

            return redirect()->route('seller.shops.products.index', $product->shop->id)
                ->with('success', 'Produit créé avec succès !');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erreurs de validation: ', $e->errors());
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

    public function update(Request $request, Product $product)
    {
        $seller = Auth::user()->seller;

        if (!$seller || !$seller->shops->contains($product->shop)) {
            return response()->json(['error' => 'Accès non autorisé à ce produit.'], 403);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'stock_quantity' => 'integer',
            'unit_price' => 'numeric',
            'category_product_id' => 'exists:category_products,id', // Correction ici
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        // Mise à jour du stock, si spécifié
        if ($request->filled('stock_quantity')) {
            $product->stocks()->updateOrCreate([], ['quantity' => $validated['stock_quantity']]);
        }

        return redirect()->back()->with('success', 'Produit mis à jour avec succès !');
    }

    // Méthode de suppression d'un produit
    public function destroy(Product $product)
    {
        $seller = Auth::user()->seller;

        if (!$seller || !$seller->shops->contains($product->shop)) {
            return response()->json(['error' => 'Accès non autorisé à ce produit.'], 403);
        }

        // Suppression du produit et des relations associées
        $product->photos()->delete();
        $product->stocks()->delete();
        $product->delete();


        return redirect()->route('seller.shops.products.index', $product->shop->id)->with('success', 'Produit supprimé avec succès !');
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
            return redirect()->route('seller.shops.products.index')
                ->with('success', 'Demande de promotion envoyée avec succès !');
        } catch (\Exception $e) {
            // Gestion des erreurs
            Log::error('Erreur lors de la demande de promotion : ' . $e->getMessage());
            return response()->json(['error' => 'Une erreur est survenue lors de la demande de promotion.'], 500);
        }
    }
}
