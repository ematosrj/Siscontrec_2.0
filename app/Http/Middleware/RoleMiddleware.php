<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user(); // Pega o usuário autenticado
    
        if (!in_array($user->role, $roles)) {
            return redirect('/'); // Redireciona se o usuário não tiver permissão
        }
    
        return $next($request);
    }
    
}

