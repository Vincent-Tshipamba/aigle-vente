<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    protected $layout = 'layouts.guest';

    public $identifier = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'identifier' => ['required', 'string'],
        'password' => ['required'],
    ];

    protected $messages = [
        'identifier.required' => 'Veuillez saisir votre email ou numéro de téléphone',
        'password.required' => 'Le mot de passe est requis',
    ];

    public function login()
    {
        $this->validate();

        $field = filter_var($this->identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = [
            $field => $this->identifier,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();

            $user = Auth::user();

            // Check if the user account is disabled
            if (!$user->is_active) {
                Auth::logout();
                return redirect()->route('login')->with(['account' => 'Votre compte est actuellement désactivé. Pour plus d\'informations ou pour réactiver votre compte, veuillez contacter notre support client.']);
            }

            return redirect()->intended(route('home', absolute: false));
        }

        $this->addError('identifier', 'Les identifiants saisis semblent incorrects. Veuillez réessayer.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}