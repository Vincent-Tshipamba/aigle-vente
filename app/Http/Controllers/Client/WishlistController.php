<?php

namespace App\Http\Controllers\Client;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist = Wishlist::create($request->all());
        return response()->json($wishlist, 201);
    }

    public function remove($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return response()->json(['message' => 'Le produit a été retiré de votre liste des souhaits avec succès !']);
    }

    public function getUserWishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->with('product')->get();

        return view('client.wishlist', compact('wishlists'));
    }
}