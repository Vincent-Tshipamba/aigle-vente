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
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'firstname.required' => 'Le prénom est requis.',
                'firstname.string' => 'Le prénom doit être une chaîne de caractères.',
                'firstname.max' => 'Le prénom ne peut pas dépasser 255 caractères.',
                'lastname.required' => 'Le nom est requis.',
                'lastname.string' => 'Le nom doit être une chaîne de caractères.',
                'lastname.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'phone.required' => 'Le numéro de téléphone est obligatoire.',
                'email.string' => 'L\'adresse e-mail doit être une chaîne de caractères.',
                'email.lowercase' => 'L\'adresse e-mail doit être en minuscule.',
                'email.email' => 'L\'adresse e-mail doit être valide.',
                'email.max' => 'L\'adresse e-mail ne peut pas dépasser 255 caractères.',
                'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
                'phone.unique' => 'Ce numéro de téléphone semble déjà pris.',
                'sexe.required' => 'Le genre est requis.',
                'sexe.string' => 'Le genre doit être une chaîne de caractères.',
                'sexe.max' => 'Le genre ne peut pas dépasser 255 caractères.',
                'password.required' => 'Le mot de passe est requis.',
                'password.confirmed' => 'Les mots de passe doivent correspondre'
            ];

            $validator = Validator::make($request->all(), [
                'phone' => 'required|string|max:255|unique:users,phone',
                'email' => 'nullable|email|max:255|unique:users,email',
                'password' => 'required|confirmed|min:8',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'sexe' => 'required|string',
                'city' => 'nullable|string',
                'country' => 'nullable|string',
                'continent' => 'nullable|string',
                'latitude' => 'nullable|string',
                'longitude' => 'nullable|string'
            ], $messages);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $validated = $validator->validated();

            // Concaténer firstname et lastname pour former name
            $name = $validated['firstname'] . '-' . $validated['lastname'];

            try {
                $user = User::create([
                    'name' => $name,
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'password' => Hash::make($validated['password']),
                ]);
                Log::info('User created successfully : ' . $user);
            } catch (\Throwable $th) {
                Log::error('Une erreur s\'est produite lors de l\'enregistrement de l\'utilisateur : ' . $th);
            }

            try {
                $location = Location::create([
                    'city' => $validated['city'],
                    'country' => $validated['country'],
                    'continent ' => $validated['continent'],
                    'latitude' => $validated['latitude'],
                    'longitude ' => $validated['longitude'],
                ]);
                Log::info('Location added successfully : ' . $location);
            } catch (\Throwable $th) {
                Log::error('Une erreur s\'est produite lors de l\'enregistrement de la localisation du client : ' . $th);
            }

            try {
                $client = Client::create([
                    'first_name' => $validated['firstname'],
                    'last_name' => $validated['lastname'],
                    'sexe' => $validated['sexe'],
                    'location_id' => $location->id,
                    'user_id' => $user->id,
                    'phone' => $validated['phone'],
                ]);
                Log::info('Client registered successfully : ' . $client);
            } catch (\Throwable $th) {
                Log::error('Une erreur s\'est produite lors de l\'enregistrement du client : ' . $th);
            }

            $role = Role::firstOrCreate(['name' => 'client']);
            $user->assignRole($role);

            broadcast(new Registered($user));

            Auth::login($user);

            $intendedUrl = route('home', false);

            return response()->json([
                'success' => 'User registered successfully.',
                'redirect' => $intendedUrl
            ], 200);
        } catch (\Throwable $e) {
            // Log the error for debugging
            Log::error('Erreur lors de l’enregistrement d’un utilisateur : ' . $e->getMessage());

            // Return a JSON response with an error message
            return response()->json(['error' => 'Une erreur est survenue lors de l’enregistrement. Veuillez réessayer.'], 500);
        }
    }
}