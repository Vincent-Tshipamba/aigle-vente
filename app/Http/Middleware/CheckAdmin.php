<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Récupérer l'ID de l'utilisateur depuis la route
        $user = $request->route('user');
        $client_exists = isset($user->client);
        $seller_exists = isset($user->seller);
        $admin_exists = $user->hasRole('superadmin');

        if ($user->hasRole('superadmin') && !$client_exists && !$seller_exists) {
            return redirect()->back();
        }
        return $next($request);
    }
}