<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Models\Client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cities = City::all();
        return view('auth.register', compact('cities'));
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
            'city' => ['required', 'exists:cities,id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Concaténer firstname et lastname pour former name
        $name = $request->firstname . '-' . $request->lastname;

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Sauvegarder les autres informations dans la table clients
        $client = Client::firstOrCreate([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'sexe' => $request->sexe,
            'city_id' => $request->city,
            'user_id' => $user->id,
            'phone' => $request->phone
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}