<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function create()
    {
        try {
            $user = Auth::user();

            if (Seller::where('user_id', Auth::id())->exists()) {
                return redirect()->route('seller.dashboard');
            }
            $nameParts = explode('-', $user->name);
$firstName = $nameParts[0] ?? '';
$lastName = $nameParts[1] ?? '';            


$sexe = $user->client->sexe ?? 'Masculin';

            return view('seller.sellers.create', compact('lastName', 'firstName', 'sexe'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Erreur lors de la création du compte vendeur.');
        }
    }

    // Créer un nouveau vendeur
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'facebook' => 'nullable|string|max:255',
                'instagram' => 'nullable|string|max:255',
                'tiktok' => 'nullable|string|max:255',
            ], [
                'phone.required' => 'Veuillez entrer un numéro de téléphone valide.',
                'address.required' => 'Veuillez indiquer votre adresse complète.',
                'profile.image' => 'Le fichier sélectionné doit être une image (JPEG, PNG, JPG, WebP).',
                'profile.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
                'facebook.max' => 'Le lien Facebook ne doit pas dépasser 255 caractères.',
                'instagram.max' => 'Le lien Instagram ne doit pas dépasser 255 caractères.',
                'tiktok.max' => 'Le lien TikTok ne doit pas dépasser 255 caractères.',
            ]);

            $validated['user_id'] = Auth::id();

            $seller = new Seller($validated);

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $filename = uniqid() . '.' . $file->getClientOriginalName();
                $path = $file->move(public_path('profileSeller'), $filename);
                $seller->picture = 'profileSeller/' . $filename;
            }

            $userName = Auth::user()->name;
            if (strpos($userName, '-') !== false) {
                [$firstName, $lastName] = explode('-', $userName);
            } else {
                $firstName = $userName;
                $lastName = '';
            }

            $user = Auth::user();
            $sexe = $user->client->sexe;

            $seller->first_name = $firstName;
            $seller->last_name = $lastName;
            $seller->sexe = $sexe;

            $seller->save();

            Social::create([
                'seller_id' => $seller->id,
                'facebook' => $validated['facebook'] ?? null,
                'instagram' => $validated['instagram'] ?? null,
                'tiktok' => $validated['tiktok'] ?? null,
            ]);

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

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'profile.required' => 'Veuillez sélectionner une image.',
            'profile.image' => 'Le fichier sélectionné doit être une image (JPEG, PNG, JPG, WebP).',
            'profile.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
        ]);

        $userId = Auth::id();
        $seller = Seller::where('user_id', $userId)->first();

        if (!$seller) {
            return response()->json(['success' => false, 'message' => 'Vendeur introuvable.'], 404);
        }

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profileSeller'), $filename);
            $seller->picture = 'profileSeller/' . $filename;
            $seller->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Photo de profil mise à jour avec succès!',
            'image_url' => asset('profileSeller/' . $filename)
        ]);
    }

    public function edit(Seller $seller)
    {
        // Vérifier si l'utilisateur connecté est le propriétaire du profil vendeur
        if (Auth::id() !== $seller->user_id) {
            return redirect()->route('seller.dashboard')->with('error', 'Vous n\'avez pas la permission de modifier ce profil.');
        }

        return view('seller.sellers.edit', compact('seller'));
    }

    public function update(Request $request, Seller $seller)
    {
        try {
            // Vérifier si l'utilisateur connecté est le propriétaire du profil vendeur
            if (Auth::id() !== $seller->user_id) {
                return redirect()->route('seller.dashboard')->with('error', 'Vous n\'avez pas la permission de modifier ce profil.');
            }

            // Validation des données mises à jour
            $validated = $request->validate([
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'facebook' => 'nullable|string|max:255',
                'instagram' => 'nullable|string|max:255',
            ], [
                'phone.required' => 'Veuillez entrer un numéro de téléphone valide.',
                'address.required' => 'Veuillez indiquer votre adresse complète.',
                'profile.image' => 'Le fichier sélectionné doit être une image (JPEG, PNG, JPG, WebP).',
                'profile.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
                'facebook.max' => 'Le lien Facebook ne doit pas dépasser 255 caractères.',
                'instagram.max' => 'Le lien Instagram ne doit pas dépasser 255 caractères.',
            ]);

            // Gestion de l'image si une nouvelle est fournie
            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();

                // Supprimer l'ancienne image si elle existe dans public/profileSeller
                if ($seller->picture && file_exists(public_path($seller->picture))) {
                    unlink(public_path($seller->picture));
                }

                // Enregistrer la nouvelle image dans public/profileSeller
                $file->move(public_path('profileSeller'), $filename);

                // Définir le nouveau chemin relatif pour l'image
                $validated['picture'] = 'profileSeller/' . $filename;
            }

            // Mise à jour du profil vendeur
            $seller->update($validated);

            // Mise à jour des réseaux sociaux
            $seller->social()->updateOrCreate(
                ['seller_id' => $seller->id],
                [
                    'facebook' => $validated['facebook'] ?? null,
                    'instagram' => $validated['instagram'] ?? null,
                ]
            );

            // Redirection avec message de succès
            return redirect()->route('seller.dashboard')->with('success', 'Profil vendeur mis à jour avec succès!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du profil vendeur : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour du profil vendeur : ' . $e->getMessage())->withInput();
        }
    }
}