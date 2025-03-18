<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Shop;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        // Récupérer l'ID du vendeur correspondant
        $seller = Seller::where('user_id', $userId)->first();


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
        $shops = Shop::inRandomOrder()
        ->where('_id', '!=', $shop->_id)
        ->get();
        $products = Product::where('shop_id', $shop->id)
            ->with(['photos', 'shop.seller'])
            ->paginate(10);

        return view('client.shops.show', compact('shop', 'products','shops'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048', // Validation de l'image
        ]);

        // Récupérer l'utilisateur connecté
        $userId = Auth::id();

        // Récupérer l'ID du vendeur correspondant
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller) {
            return redirect()->route('shops.create')->withErrors(['seller' => 'Le vendeur n\'existe pas.']);
        }

        // Gestion de l'image si elle existe
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->move(public_path('shops_profile'), $imageName);
        }

        $shop = Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'seller_id' => $seller->id, 
            'image' => 'shops_profile/'.$imageName,
        ]);

        // Rediriger vers une page de confirmation ou la liste des boutiques
        return redirect()->route('shops.index')->with('success', 'Boutique créée avec succès!');
    }


    public function edit(Shop $shop)
    {
        // Vérifier si le vendeur connecté possède la boutique
        $seller = Auth::user()->seller;

        if (!$seller || $shop->seller_id !== $seller->id) {
            return response()->json(['error' => 'Accès non autorisé à cette boutique.'], 403);
        }

        return view('seller.shops.edit', compact('shop'));
    }
   public function update(Request $request, Shop $shop)
    {
        // Vérifier si le vendeur connecté possède la boutique
        $seller = Auth::user()->seller;
        if (!$seller || $seller->id !== $shop->seller_id) {
            return redirect()->route('shops.index')->with('error', 'Vous n\'avez pas la permission de modifier cette boutique.');
        }

        // Validation des données mises à jour
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        ]);

        // Gestion de l'image si une nouvelle est fournie
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();

            // Supprimer l'ancienne image si elle existe dans public/shops_profile
            if ($shop->image && file_exists(public_path($shop->image))) {
                unlink(public_path($shop->image));
            }

            // Enregistrer la nouvelle image dans public/shops_profile
            $imageFile->move(public_path('shops_profile'), $imageName);

            // Définir le nouveau chemin relatif pour l'image
            $validated['image'] = 'shops_profile/' . $imageName;
        }

        // Mise à jour de la boutique
        $shop->update($validated);

        // Redirection avec message de succès
        return redirect()->route('shops.index')->with('success', 'Boutique modifiée avec succès!');
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
            // Supprimer l'image associée si elle existe
            if ($shop->image) {
                Storage::delete('public/shops_profile/' . basename($shop->image));
            }

            // Supprimer la boutique
            $shop->delete();

            // Rediriger avec un message de confirmation
            return redirect()->back()->with('success', 'Boutique supprimée avec succès.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression de la boutique.']);
        }
    }

    public function fetchShops(Request $request)
    {
        $query = Shop::query();

        if ($request->has('recent')) {
            $query->where('created_at', '>=', now()->subDays(30));
        }

        $products = $query->paginate(10);

        return response()->json([
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        try {
             $searchTerm = $request->input('search');
            $activites = Shop::where('name', 'LIKE', "%{$searchTerm}%")
                    ->take(20)
                    ->latest()
                    ->get();

        return response()->json($activites);
        } catch (\Exception $e) {
            return response()->json($e);
        }

    }

}