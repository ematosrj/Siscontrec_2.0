<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se tem um dos papéis permitidos no banco de dados
        $user = Auth::user();

        // Se o usuário não tiver um papel de "Super-Usuario" ou "Administrador", ele não pode acessar
        if (!$user || !in_array($user->access, ['Super-Usuario', 'Administrador'])) {
            return redirect()->route('home')->with('error', 'Acesso negado!');
        }

        return $next($request);
    }
}
