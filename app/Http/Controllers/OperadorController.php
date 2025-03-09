<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $request->validate([
            'registration_number' => 'required|string|unique:users,registration_number',
            'rank' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'access' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
        
        $user = new User();
        $user->registration_number = $request->registration_number;
        $user->rank = $request->rank;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->access = $request->access;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('operadores.create')->with('success', 'Operador cadastrado com sucesso!');
        
    
}
}