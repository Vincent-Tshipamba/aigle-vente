<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user account is disabled
            if (!$user->is_active) {
                Auth::logout();
                return redirect()->route('login')->with(['account' => 'Votre compte est actuellement désactivé. Pour plus d\'informations ou pour réactiver votre compte, veuillez contacter notre support client.']);
            }

            // Regenerate session if the user is not disabled
            $request->session()->regenerate();

            return redirect()->intended(route('home', absolute: false));
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'Nous n\'avons pas pu trouver un compte avec cet e-mail. Veuillez vérifier et réessayer.',
            'password' => 'Le mot de passe que vous avez saisi est incorrect. Veuillez réessayer.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Cache::forget('user-is-online-' . Auth::user()->id);
        Auth::user()->update(['last_activity' => now()]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
