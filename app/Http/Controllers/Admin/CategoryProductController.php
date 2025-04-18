<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        $categories = CategoryProduct::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'name.required' => 'Veuillez saisir un nom de catégorie.',
            'image.required' => 'Une image est requise.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Formats acceptés : jpeg, png, jpg, webp.',
            'image.max' => 'L’image ne doit pas dépasser 2 Mo.',
        ]);

        // Générer un nom unique
        $image = $request->file('image');
        $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Déplacer dans public/shops_profile
        $image->move(public_path('img/categories/'), $imageName);

        // Enregistrer dans la base de données
        $category = CategoryProduct::firstOrCreate([
            'name' => $validated['name'],
        ], [
            'description' => $validated['description'] ?? null,
            'image' => 'img/categories/' . $imageName,
        ]);

        return response()->json(['message' => 'Catégorie créée avec succès']);
    }



    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        return view('admin.categories.show', compact('categoryProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, CategoryProduct $categoryProduct)
{
    $categoryProduct = CategoryProduct::findOrFail($request->id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ], [
        'name.required' => 'Veuillez saisir un nom de catégorie.',
        'image.image' => 'Le fichier doit être une image.',
        'image.mimes' => 'Formats acceptés : jpeg, png, jpg, webp.',
        'image.max' => 'L’image ne doit pas dépasser 2 Mo.',
    ]);

    // Si une nouvelle image est envoyée
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($categoryProduct->image && file_exists(public_path($categoryProduct->image))) {
            unlink(public_path($categoryProduct->image));
        }

        $image = $request->file('image');
        $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/categories/'), $imageName);
        $validated['image'] = 'img/categories/' . $imageName;
    }

    $categoryProduct->update($validated);

    return response()->json(['message' => 'Catégorie modifiée avec succès']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CategoryProduct $categoryProduct)
    {
        $categoryProduct = CategoryProduct::find($request->categoryId);
        $categoryProduct->delete();
        return response()->json(['message' => 'Catégorie supprimée avec succès']);
    }
}
