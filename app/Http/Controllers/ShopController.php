<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // Afficher toutes les boutiques du vendeur connecté
    public function index()
    {
        $seller = Auth::user()->seller;

        if (!$seller) {
            return response()->json(['error' => 'Vendeur non trouvé.'], 404);
        }

        $shops = $seller->shops;
        return response()->json($shops);
    }

    // Créer une nouvelle boutique pour le vendeur connecté
    public function store(Request $request)
    {
        $seller = Auth::user()->seller;

        if (!$seller) {
            return response()->json(['error' => 'Vendeur non trouvé.'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $shop = $seller->shops()->create($validated);
        return response()->json($shop, 201);
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
