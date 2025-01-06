<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        // Récupérer l'ID du vendeur correspondant
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller) {
            return response()->json(['error' => 'Vendeur non trouvé.'], 404);
        }

        $shops = $seller->shops;
        $ShopCategories = ShopCategory::all();
        return view('seller.shops.index', compact('shops', 'ShopCategories'));
    }


    public function create()
    {
        return view('seller.shops.create');
    }

    public function show($id)
    {
        $shop = Shop::where('_id', $id)->first();
        $products = Product::where('shop_id', $shop->id)->get();

        return view('client.shops.show', compact('shop', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Récupérer l'utilisateur connecté
        $userId = Auth::id();

        // Récupérer l'ID du vendeur correspondant
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller) {
            return redirect()->route('shops.create')->withErrors(['seller' => 'Le vendeur n\'existe pas.']);
        }

        // Créer une nouvelle boutique avec le 'seller_id' récupéré
        $shop = Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'seller_id' => $seller->id,  // Utiliser l'ID du vendeur existant
        ]);

        // Rediriger vers une page de confirmation ou la liste des boutiques
        return redirect()->route('shops.index')->with('success', 'Boutique créée avec succès!');
    }

    public function edit(Shop $shop){
        // Vérifier si le vendeur connecté possède la boutique
        $seller = Auth::user()->seller;

        if (!$seller || $shop->seller_id!== $seller->id) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        return view('seller.shops.edit', compact('shop'));
    }
    public function update(Request $request, Shop $shop)
    {
        // Vérifier si le vendeur connecté possède la boutique
        $seller = Auth::user()->seller;

        if (!$seller || $shop->seller_id !== $seller->id) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'address' => 'string',
            'description' => 'nullable|string',
        ]);

        $shop->update($validated);
        return view('seller.shops.index')->with('success', 'Boutique Modifier avec succès!');
    }

    // Supprimer une boutique si elle appartient au vendeur connecté
    public function destroy(Shop $shop)
    {
        // Vérifier si le vendeur connecté possède la boutique
        $seller = Auth::user()->seller;

        if (!$seller || $shop->seller_id !== $seller->id) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }
        try {
            $shop->delete();
            // Rediriger avec un message de confirmation
            return redirect()->back()->with('success', 'Boutique supprimée avec succès.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression de la boutique.']);
        }
    }
}