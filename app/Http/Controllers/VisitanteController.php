<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user(); // Obtém o usuário autenticado

        $query = Visitante::latest();

        // Filtro por data
        if ($request->filled('data_filter')) {
            $query->whereDate('data_hora_entrada', $request->data_filter);
        }

        // Filtro por mês e ano
        if ($request->filled('mes_filter') && $request->filled('ano_filter')) {
            $query->whereMonth('data_hora_entrada', $request->mes_filter)
                  ->whereYear('data_hora_entrada', $request->ano_filter);
        }

        // Paginação dos visitantes, carregando também o usuário
        $visitantes = $query->with('usuarioRegistrou')->paginate(10);

        // Retorna a view passando os visitantes e o usuário
        return view('visitantes.index', compact('visitantes', 'user'));
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
            'opm_visitada_id' => 'required|string|max:255', // Mudou para texto
        ]);

        // Criando o visitante
        Visitante::create([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'data_hora_entrada' => $request->data_hora_entrada,
            'data_hora_saida' => $request->data_hora_saida,
            'usuario_registrou_id' => Auth::id(), // Obtém o ID do usuário logado
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
            'opm_visitada_id' => 'required|string|max:255', // Mudou para texto
        ]);

        // Atualizando o visitante
        $visitante->update($request->all());

        return redirect()->route('visitantes.index')->with('success', 'Visitante atualizado com sucesso!');
    }

    public function destroy(Visitante $visitante)
    {
        // Excluindo o visitante
        $visitante->delete();
        return redirect()->route('visitantes.index')->with('success', 'Visitante excluído com sucesso!');
    }
}

