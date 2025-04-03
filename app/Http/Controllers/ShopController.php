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
        $products = Product::where('shop_id', $shop->id)
            ->with(['photos', 'shop.seller'])
            ->paginate(10);

        return view('client.shops.show', compact('shop', 'products'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'nullable|string',
                'description' => 'nullable|string',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048', // Validation de l'image
            ], [
                'name.required' => 'Le nom de la boutique est obligatoire.',
                'name.max' => 'Le nom de la boutique ne doit pas dépasser 255 caractères.',
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être de type : jpeg, png, jpg, gif, svg.',
                'image.max' => 'L\'image ne doit pas dépasser 7048 Ko.',
                'latitude.numeric' => 'La latitude doit être un nombre.',
                'longitude.numeric' => 'La longitude doit être un nombre.',
            ]);

            // Récupérer l'utilisateur connecté
            $userId = Auth::id();

            // Récupérer l'ID du vendeur correspondant
            $seller = Seller::where('user_id', $userId)->first();



            $shopCount = Shop::where('seller_id', $seller->id)->count();

            if ($shopCount >= 3) {
                return redirect()->route('shops.index')->withErrors(['error' => 'Vous ne pouvez pas créer plus de 3 boutiques.']);
            }

            // Gestion de l'image si elle existe
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
                $imagePath = $imageFile->move(public_path('shops_profile'), $imageName);
            }




            $shop = Shop::create([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'latitude' => $validated['latitude'],
                'longitude' => $validated['longitude'],
                'description' => $validated['description'],
                'seller_id' => $seller->id,
                'image' => $imageName ? 'shops_profile/' . $imageName : null,
            ]);

            // Rediriger vers une page de confirmation ou la liste des boutiques
            return redirect()->route('shops.index')->with('success', 'Boutique créée avec succès!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de la boutique : ' . $e->getMessage())->withInput();
        }
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
        try {
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
            ], [
                'name.max' => 'Le nom de la boutique ne doit pas dépasser 255 caractères.',
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être de type : jpeg, png, jpg, gif, svg.',
                'image.max' => 'L\'image ne doit pas dépasser 7048 Ko.',
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de la boutique : ' . $e->getMessage())->withInput();
        }
    }



    // Supprimer une boutique si elle appartient au vendeur connecté
    public function destroy(Shop $shop)
    {

        try {
            // Supprimer l'image associée si elle existe
            if ($shop->image && file_exists(public_path($shop->image))) {
                unlink(public_path($shop->image));
            }

            $shop->delete();

            // Rediriger avec un message de confirmation
            return redirect()->back()->with('success', 'Boutique supprimée avec succès.');
        } catch (\Exception $th) {
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
