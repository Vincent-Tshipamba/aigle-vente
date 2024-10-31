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
        if ($user->hasRole('superadmin') || !$user->client || !$user->seller) {
            return redirect()->route('admin.users.index');
        }
        return $next($request);
    }
}