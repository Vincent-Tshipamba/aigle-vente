<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $product_id)
    {
        $request->validate([
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'product_id' => $product_id, // Correction ici
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Avis ajouté avec succès !');
    }

}