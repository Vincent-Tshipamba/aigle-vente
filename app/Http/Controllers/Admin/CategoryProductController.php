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
    public function edit(CategoryProduct $category)
    {
        //
         return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, CategoryProduct $category)
    {
       
        try {
            // Validation des données
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

           
            if ($request->hasFile('image')) {
                
                if ($category->image && file_exists(public_path($category->image))) {
                    unlink(public_path($category->image));
                }

                // Enregistrer la nouvelle image
                $image = $request->file('image');
                $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img/categories/'), $imageName);
                $validated['image'] = 'img/categories/' . $imageName;
            }

            // Mise à jour des données
            $category->update($validated);

            // Réponse en cas de succès
            return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès.');
        } catch (\Exception $e) {
          
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(CategoryProduct $category)
    {
        $category->delete();
        return response()->json(['message' => 'Catégorie supprimée avec succès']);
    }

}
