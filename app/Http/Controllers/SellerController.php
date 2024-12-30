<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Seller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    public function create()
    {

        try {
            $user = Auth::user();

            if (Seller::where('user_id', Auth::id())->exists()) {
                return redirect()->route('seller.dashboard');
            }
            [$firstName, $lastName] = explode('-', $user->name);

            $sexe = $user->client->sexe;


            return view('seller.sellers.create', compact('lastName', 'firstName','sexe'));
        } catch (\Exception $e) {
            return redirect()->route('seller.dashboard')->with('error', $e->getMessage());
        }
    }

    // Créer un nouveau vendeur
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'phone' => 'required|string|max:20',
                'sexe' => 'required|string|in:Masculin,Féminin',
                'address' => 'required|string|max:255',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            ], [
                'phone.required' => 'Le numéro de téléphone est requis.',
                'sexe.in' => 'Le sexe doit être Masculin ou Féminin.',
                'address.required' => 'L\'adresse est obligatoire.',
                'picture.image' => 'Le fichier doit être une image.',
            ]);

            $seller = new Seller($validated);
            $seller->user_id = Auth::id();

            if ($request->hasFile('picture')) {
                $path = $request->file('picture')->store('images/sellers', 'public');
                $seller->picture = $path;
            }

            $userName = Auth::user()->name;
            if (strpos($userName, '-') !== false) {
                [$firstName, $lastName] = explode('-', $userName);
            } else {
                $firstName = $userName;
                $lastName = '';
            }

            $seller->first_name = $firstName;
            $seller->last_name = $lastName;

            $seller->save();

            return redirect()->route('seller.dashboard')->with('success', 'Vendeur créé avec succès!');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du vendeur : ' . $e->getMessage());
            return back()->withErrors(['error' => 'Une erreur s\'est produite. Veuillez réessayer plus tard.'])->withInput();
        }
    }


    public function profile()
    {

        $userId = Auth::id();
        $seller = Seller::where('user_id', $userId)->first();
        if (!$seller) {
            return redirect()->route('seller.create')->with('warning', 'Veuillez créer un profil de vendeur.');
        }

        return view('seller.sellers.profile', compact('seller'));
    }
}