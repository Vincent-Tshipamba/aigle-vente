<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Seller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    public function create()
    {
        $cities = City::all();

        return view('seller.sellers.create', compact('cities'));
    }

    // Créer un nouveau vendeur
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'phone' => 'required|string|max:20',
                'sexe' => 'required|string|in:Masculin,Féminin',
                'address' => 'required|string|max:255',
                'city_id' => 'required|exists:cities,id',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $seller = new Seller($validated);
            $seller->user_id = Auth::id();

            // Gérer l'upload de l'image si présente
            if ($request->hasFile('picture')) {
                $filename = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('images/sellers'), $filename);
                $seller->picture = 'images/sellers/' . $filename;
            }

            // Extraire le nom et le sexe de l'utilisateur
            $userName = Auth::user()->name;
            [$firstName, $lastName] = explode('-', $userName);

            $seller->first_name = $firstName;
            $seller->last_name = $lastName;

           
            $user = Auth::user();
            $role = Role::firstOrCreate(['name' => 'vendeur']);

            
            // $user->roles()->attach($role->id);

            $seller->save();

            return redirect()->route('seller.dashboard')->with('success', 'Vendeur créé avec succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création du vendeur. ' . $e->getMessage()])->withInput();
        }
    }
}
