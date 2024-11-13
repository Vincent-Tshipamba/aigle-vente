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
        ], [
            'name.required' => 'Veuillez saisir un nom de catégorie.',
        ]);

        CategoryProduct::firstOrCreate([
            'name' => $validated['name'],
            'description' => $validated['description'],
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
        $categoryProduct = CategoryProduct::find($request->id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Veuillez saisir un nom de catégorie.',
        ]);

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