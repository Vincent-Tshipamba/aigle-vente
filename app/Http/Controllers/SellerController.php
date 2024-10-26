<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::all();
        return response()->json($sellers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'sexe' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,_id',
            'user_id' => 'required|exists:users,id'
        ]);

        $seller = Seller::create($validated);
        return response()->json($seller, 201);
    }

    public function show($id)
    {
        $seller = Seller::findOrFail($id);
        return response()->json($seller);
    }

    public function update(Request $request, $id)
    {
        $seller = Seller::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'phone' => 'string|max:20',
            'sexe' => 'string|max:10',
            'address' => 'string|max:255',
            'city_id' => 'exists:cities,_id',
            'user_id' => 'exists:users,id'
        ]);

        $seller->update($validated);
        return response()->json($seller);
    }

    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        return response()->json(['message' => 'Seller deleted successfully']);
    }
}
