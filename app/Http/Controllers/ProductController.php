<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Log;
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

        $products = $shop->products()->paginate(10);

        $categories = CategoryProduct::All();


        return view('seller.produits.index', compact('products', 'categories', 'shop'));
    }




    public function store(Request $request, Shop $shop)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'stock_quantity' => 'required|integer',
                'price' => 'required|numeric',
                'category_product_id' => 'required|exists:category_products,id', // Modifiez ici
                'description' => 'nullable|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'name.required' => 'Le nom du produit est requis.',
                'stock_quantity.required' => 'La quantité de stock est obligatoire.',
                'price.required' => 'Le prix est obligatoire.',
                'category_product_id.required' => 'Veuillez sélectionner une catégorie.', // Modifiez ici
                'category_product_id.exists' => 'La catégorie sélectionnée n\'existe pas.', // Modifiez ici
                'images.*.image' => 'Chaque fichier doit être une image.',
                'images.*.mimes' => 'Les images doivent être en format jpeg, png, jpg, ou gif.',
                'images.*.max' => 'Chaque image doit être de 2 Mo maximum.',
            ]);

            // Ajout de l'ID de la boutique
            $validated['shop_id'] = $shop->id;

            // Création du produit
            $product = Product::create([
                'name' => $validated['name'], // Assurez-vous d'utiliser $validated
                'stock_quantity' => $validated['stock_quantity'], // Ajoutez ceci
                'unit_price' => $validated['price'], // Modifiez ici pour correspondre au champ correct
                'category_product_id' => $validated['category_product_id'], // Modifiez ici
                'description' => $validated['description'], // Modifiez ici
                'shop_id' => $validated['shop_id'], // Utilisez l'ID de la boutique ici
            ]);


            // Vérification si le produit a été créé
            if (!$product) {
                Log::error('Le produit n\'a pas été créé.');
                return redirect()->back()->with('error', 'Le produit n\'a pas pu être créé.')->withInput();
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    // Spécifiez le disque 'public' ici
                    $path = $imageFile->store('images', 'public');

                    $product->photos()->create([
                        'image' => $path,
                        'description' => 'Image pour ' . $product->name,
                    ]);
                }
            }

            return redirect()->route('seller.shops.products.index')
                ->with('success', 'Produit créé avec succès !');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log des erreurs de validation
            Log::error('Erreurs de validation: ', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log de toute autre erreur
            Log::error('Erreur lors de la création du produit: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du produit : ' . $e->getMessage())->withInput();
        }
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
