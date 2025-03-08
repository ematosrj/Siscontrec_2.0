<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Verificando se o usuário está autenticado e se ele possui o acesso permitido
        if (Auth::check() && in_array(Auth::user()->acess, ['Super-Usuario', 'Administrador'])) {
            return $next($request);
        }

        // Se não tiver permissão, redireciona para a página inicial ou qualquer outra página
        return redirect()->route('home')->with('error', 'Você não tem permissão para acessar essa página.');
    }
}

