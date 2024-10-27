<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return response()->json($shops);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'seller_id' => 'required|exists:sellers,_id',
            'description' => 'nullable|string'
        ]);

        $shop = Shop::create($validated);
        return response()->json($shop, 201);
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        return response()->json($shop);
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'address' => 'string|max:255',
            'seller_id' => 'exists:sellers,_id',
            'description' => 'string'
        ]);

        $shop->update($validated);
        return response()->json($shop);
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return response()->json(['message' => 'Shop deleted successfully']);
    }
}
