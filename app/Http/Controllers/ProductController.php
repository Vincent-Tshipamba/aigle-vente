<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category_product', 'shop')->paginate(5); // Ajustez la pagination selon vos besoins
        return view('seller.produits.index', compact('products'));
    }

    

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("seller.produits.show", compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'stock_quantity' => 'integer|min:0',
            'unit_price' => 'numeric|min:0',
            'category_produit_id' => 'exists:category_products,_id',
            'shop_id' => 'exists:shops,_id',
            'description' => 'string'
        ]);

        $product->update($validated);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function create()
    {
        $categories = CategoryProduct::all();
        $shops = Shop::all();
        return view('seller.produits.create', compact('categories', 'shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock_quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
            'category_produit_id' => 'required|exists:category_products,id',
            'shop_id' => 'required|exists:shops,id',
            'picture' => 'nullable|image|max:2048'
        ]);

        $product = new Product($request->only([
            'name',
            'description',
            'stock_quantity',
            'unit_price',
            'category_produit_id',
            'shop_id'
        ]));
        $product->_id = (string) Str::uuid();

        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('products', 'public');
            $product->picture = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produit créé avec succès!');
    }

    
}
