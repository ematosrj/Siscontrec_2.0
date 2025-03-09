<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::latest()->paginate(10);
        return view('visitantes.index', compact('visitantes'));
    }

    public function create()
    {
        return view('visitantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'required|string|max:255',
            'data_hora_entrada' => 'required|date',
            'quem_visitar' => 'required|string|max:255',
            'veiculo_tipo' => 'nullable|string',
            'veiculo_marca' => 'nullable|string',
            'veiculo_modelo' => 'nullable|string',
            'placa' => 'nullable|string|max:10',
            'opm_visitada_id' => 'required|integer',
        ]);

        Visitante::create([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'data_hora_entrada' => $request->data_hora_entrada,
            'data_hora_saida' => $request->data_hora_saida,
            'usuario_registrou_id' => Auth::id(),
            'opm_visitada_id' => $request->opm_visitada_id,
            'quem_visitar' => $request->quem_visitar,
            'veiculo_tipo' => $request->veiculo_tipo,
            'veiculo_marca' => $request->veiculo_marca,
            'veiculo_modelo' => $request->veiculo_modelo,
            'placa' => $request->placa,
        ]);

        return redirect()->route('visitantes.index')->with('success', 'Visitante cadastrado com sucesso!');
    }

    public function show(Visitante $visitante)
    {
        return view('visitantes.show', compact('visitante'));
    }

    public function edit(Visitante $visitante)
    {
        return view('visitantes.edit', compact('visitante'));
    }

    public function update(Request $request, Visitante $visitante)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento' => 'required|string|max:255',
            'data_hora_entrada' => 'required|date',
            'data_hora_saida' => 'nullable|date',
            'quem_visitar' => 'required|string|max:255',
            'veiculo_tipo' => 'nullable|string',
            'veiculo_marca' => 'nullable|string',
            'veiculo_modelo' => 'nullable|string',
            'placa' => 'nullable|string|max:10',
            'opm_visitada_id' => 'required|integer',
        ]);

        $visitante->update($request->all());

        return redirect()->route('visitantes.index')->with('success', 'Visitante atualizado com sucesso!');
    }

    public function destroy(Visitante $visitante)
    {
        $visitante->delete();
        return redirect()->route('visitantes.index')->with('success', 'Visitante excluído com sucesso!');
    }
}
