<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('seller.shops.index',compact('shops'));
    }

    // Créer une nouvelle boutique pour le vendeur connecté
    public function create()
    {
        return view('seller.shops.create');
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



    // Mettre à jour une boutique si elle appartient au vendeur connecté
    public function update(Request $request, Shop $shop)
    {
        $seller = Auth::user()->seller;

        if (!$seller || !$seller->shops->contains($shop)) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'address' => 'string',
            'description' => 'nullable|string',
        ]);

        $shop->update($validated);
        return response()->json($shop);
    }

    // Supprimer une boutique si elle appartient au vendeur connecté
    public function destroy(Shop $shop)
    {
        $seller = Auth::user()->seller;

        if (!$seller || !$seller->shops->contains($shop)) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        $shop->delete();
        return response()->json(['message' => 'Boutique supprimée']);
    }
}
