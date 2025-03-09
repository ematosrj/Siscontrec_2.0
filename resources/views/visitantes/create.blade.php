@extends('layouts.main')

@section('title', 'Cadastrar Visitante')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Cadastrar Visitante</h2>

    <form method="POST" action="{{ route('visitantes.store') }}">
        @csrf

        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" required class="form-input" value="{{ old('nome') }}">
                </div>

                <div>
                    <label for="documento" class="block text-sm font-medium text-gray-700">Documento</label>
                    <input type="text" name="documento" id="documento" required class="form-input" value="{{ old('documento') }}">
                </div>

                <div>
    <label for="data_hora_entrada" class="block text-sm font-medium text-gray-700">Data e Hora de Entrada</label>
    <input type="datetime-local" name="data_hora_entrada" id="data_hora_entrada" required class="form-input bg-gray-100 cursor-not-allowed" value="{{ now()->format('Y-m-d\TH:i') }}" readonly>
</div>


                <div>
                    <label for="quem_visitar" class="block text-sm font-medium text-gray-700">Quem Visitar</label>
                    <input type="text" name="quem_visitar" id="quem_visitar" required class="form-input" value="{{ old('quem_visitar') }}">
                </div>

                <div>
                    <label for="veiculo_tipo" class="block text-sm font-medium text-gray-700">Tipo do Veículo</label>
                    <select name="veiculo_tipo" id="veiculo_tipo" class="form-select">
                        <option value="" selected disabled>Selecione</option>
                        <option value="Carro">Carro</option>
                        <option value="Moto">Moto</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>

                <div>
                    <label for="veiculo_marca" class="block text-sm font-medium text-gray-700">Marca</label>
                    <input type="text" name="veiculo_marca" id="veiculo_marca" class="form-input" value="{{ old('veiculo_marca') }}">
                </div>

                <div>
                    <label for="veiculo_modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                    <input type="text" name="veiculo_modelo" id="veiculo_modelo" class="form-input" value="{{ old('veiculo_modelo') }}">
                </div>

                <div>
                    <label for="placa" class="block text-sm font-medium text-gray-700">Placa</label>
                    <input type="text" name="placa" id="placa" class="form-input" value="{{ old('placa') }}">
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>
</div>
@endsection
