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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'sexe' => ['required', 'string', 'max:255'],
            'current_city' => ['nullable', 'string'],
            'current_continent' => ['nullable', 'string'],
            'current_country' => ['nullable', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Concaténer firstname et lastname pour former name
        $name = $request->firstname . '-' . $request->lastname;

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'sexe' => $request->sexe,
            'location_id' => $location->id,
            'user_id' => $user->id,
            'phone' => $request->phone
        ]);

        $role = Role::firstOrCreate(['name' => 'client']);
        $user->assignRole($role);

        broadcast(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
