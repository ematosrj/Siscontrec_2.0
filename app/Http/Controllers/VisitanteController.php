<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitanteController extends Controller
{

    public function create() {

        return view('visitantes.create');
    }

    public function getVeiculoInfo(Request $request)
    {
        // A API FIPE possui endpoints para obter marcas, modelos e tipos de veículos
        $client = new Client();
        $response = $client->request('GET', 'https://fipeapi.appspot.com/api/1/carros/veiculo/'.$request->id.'/json');

        $data = json_decode($response->getBody(), true);
        return response()->json($data); // Retorna as informações do veículo em formato JSON
    }

    public function store(Request $request)
    {
        // Obtendo o usuário logado
        $user = Auth::user();
        
        // Criando o visitante e associando o usuário logado ao visitante
        $visitante = Visitante::create([
            'name' => $request->input('name'),
            'documento' => $request->input('documento'),
            'data_hora_entrada' => now(),
            'data_hora_saida' => null,  // saída será nula até o visitante sair
            'usuario_id' => $user->id,  // Associando o usuário logado
            'opm_id' => $user->unit,    // Associando a unidade do usuário
            'quem_veio_visitar' => $request->input('quem_veio_visitar'),
            'veiculo_tipo' => $request->input('veiculo_tipo'),
            'veiculo_marca' => $request->input('veiculo_marca'),
            'veiculo_modelo' => $request->input('veiculo_modelo'),
            'veiculo_placa' => $request->input('veiculo_placa')
        ]);

        return redirect()->route('visitantes.index');
    }
}
