<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperadorController extends Controller
{
    public function create()
    {
        // O acesso é verificado pelo middleware, então só vai chegar aqui quem tem permissão
        return view('operadores.create');
    }
    

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'hierarquia' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'acesso' => 'required|in:Super-Usuario,Administrador,Operador',
        ]);

        // Criando um novo operador e salvando no banco
        $operador = new Operador();
        $operador->hierarquia = $request->hierarquia;
        $operador->nome = $request->nome;
        $operador->email = $request->email;
        $operador->acess = $request->acesso;

        // Você pode também configurar a senha para o operador (se necessário)
        // $operador->password = Hash::make($request->password);
        
        // Salvando o operador no banco de dados
        $operador->save();

        return redirect()->route('operadores.create')->with('success', 'Operador criado com sucesso!');
    }
}
