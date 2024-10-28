<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Shop;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
 
    public function index(Shop $shop)
    {
        $userId = Auth::id();

        // Récupérer le vendeur lié à cet utilisateur
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller || !$seller->shops()->where('id', $shop->id)->exists()) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        $products = $shop->products;

        $categories= CategoryProduct::All();
         
        return view('seller.produits.index', compact('products', 'categories'));
    }


  
    public function store(Request $request, Shop $shop)
    {
        $seller = Auth::user()->seller;

        if (!$seller || !$seller->shops->contains($shop)) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock_quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_produit_id' => 'required|exists:category_products,_id',
            'description' => 'nullable|string',
        ]);

        $product = $shop->products()->create($validated);
        return response()->json($product, 201);
    }

    // Mettre à jour un produit si le produit appartient à une boutique du vendeur connecté
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
            'category_produit_id' => 'exists:category_products,_id',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);
        return response()->json($product);
    }

    // Supprimer un produit si le produit appartient à une boutique du vendeur connecté
    public function destroy(Product $product)
    {
        $seller = Auth::user()->seller;

        if (!$seller || !$seller->shops->contains($product->shop)) {
            return response()->json(['error' => 'Accès non autorisé à ce produit.'], 403);
        }

        $product->delete();
        return response()->json(['message' => 'Produit supprimé']);
    }
}
