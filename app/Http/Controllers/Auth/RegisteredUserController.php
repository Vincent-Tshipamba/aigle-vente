<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Client;
use App\Models\Location;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $messages = [
                'firstname.required' => 'Le prénom est requis.',
                'firstname.string' => 'Le prénom doit être une chaîne de caractères.',
                'firstname.max' => 'Le prénom ne peut pas dépasser 255 caractères.',
                'lastname.required' => 'Le nom est requis.',
                'lastname.string' => 'Le nom doit être une chaîne de caractères.',
                'lastname.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'email.required' => 'L\'adresse e-mail est requise.',
                'email.string' => 'L\'adresse e-mail doit être une chaîne de caractères.',
                'email.lowercase' => 'L\'adresse e-mail doit être en minuscule.',
                'email.email' => 'L\'adresse e-mail doit être valide.',
                'email.max' => 'L\'adresse e-mail ne peut pas dépasser 255 caractères.',
                'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
                'sexe.required' => 'Le genre est requis.',
                'sexe.string' => 'Le genre doit être une chaîne de caractères.',
                'sexe.max' => 'Le genre ne peut pas dépasser 255 caractères.',
                'password.required' => 'Le mot de passe est requis.',
            ];

            $validated = $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'sexe' => ['required', 'string', 'max:255'],
                'current_city' => ['nullable', 'string'],
                'current_continent' => ['nullable', 'string'],
                'current_country' => ['nullable', 'string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ], $messages);

            // Concaténer firstname et lastname pour former name
            $name = $validated['firstname'] . '-' . $validated['lastname'];

            $user = User::create([
                'name' => $name,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Create a new location record
            $location = Location::firstOrCreate([
                'continent' => $request->current_continent,
                'country' => $request->current_country,
                'city' => $request->current_city,
                'latitude' => $request->current_latitude,
                'longitude' => $request->current_longitude,
            ]);

            // Sauvegarder les autres informations dans la table clients
            $client = Client::create([
                'first_name' => $validated['firstname'],
                'last_name' => $validated['lastname'],
                'sexe' => $validated['sexe'],
                'location_id' => $location->id,
                'user_id' => $user->id,
                'phone' => $request->phone
            ]);

            $role = Role::firstOrCreate(['name' => 'client']);
            $user->assignRole($role);

            broadcast(new Registered($user));

            Auth::login($user);

            return redirect(route('home', absolute: false));
        } catch (\Throwable $e) {
            // Log the error for debugging
            Log::error('Erreur lors de l’enregistrement d’un utilisateur : ' . $e->getMessage());

            // Rediriger avec un message d’erreur pour l’utilisateur
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l’enregistrement. Veuillez réessayer.']);
        }
    }
}