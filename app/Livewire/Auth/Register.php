<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Client;
use App\Models\Location;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class Register extends Component
{
    public $phone;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $sexe;
    public $city;
    public $country;
    public $continent;
    public $latitude;
    public $longitude;

    protected $rules = [
        'phone' => 'required|string|max:255|unique:users,phone',
        'email' => 'nullable|email|max:255|unique:users,email',
        'password' => 'required|min:8',
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'sexe' => 'required|string',
    ];

    protected $messages = [
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
    ];

    public function register()
    {
        dd($this->firstname, $this->country, $this->sexe, $this->latitude, $this->longitude);
        $this->validate();

        try {
            $name = $this->firstname . '-' . $this->lastname;

            $user = User::create([
                'name' => $name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make($this->password),
            ]);

            $location = Location::create([
                'city' => $this->city,
                'country' => $this->country,
                'continent' => $this->continent,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ]);

            $client = Client::create([
                'first_name' => $this->firstname,
                'last_name' => $this->lastname,
                'sexe' => $this->sexe,
                'location_id' => $location->id,
                'user_id' => $user->id,
                'phone' => $this->phone,
            ]);

            $role = Role::firstOrCreate(['name' => 'client']);
            $user->assignRole($role);

            event(new Registered($user));

            Auth::login($user);

            return redirect()->intended(route('home', absolute: false));

        } catch (\Throwable $e) {
            Log::error('Erreur lors de l’enregistrement d’un client : ' . $e->getMessage());
            session()->flash('error', 'Une erreur est survenue lors de l’enregistrement. Veuillez réessayer.');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}