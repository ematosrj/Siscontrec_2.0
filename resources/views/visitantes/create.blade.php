@extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold leading-tight text-gray-800 mb-4">Cadastrar Visitante</h2>

    <!-- Formulário de Cadastro de Visitante -->
    <form method="POST" action="{{ route('visitantes.store') }}">
        @csrf

        <div class="bg-white shadow-sm sm:rounded-lg mb-4">
            <div class="px-4 py-5 sm:px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Nome do Visitante -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Documento do Visitante -->
                    <div>
                        <label for="documento" class="block text-sm font-medium text-gray-700">Documento</label>
                        <input type="text" name="documento" id="documento" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('documento') }}">
                        @error('documento')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Quem Veio Visitar -->
                    <div>
                        <label for="quem_veio_visitar" class="block text-sm font-medium text-gray-700">Quem Veio Visitar</label>
                        <input type="text" name="quem_veio_visitar" id="quem_veio_visitar" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('quem_veio_visitar') }}">
                        @error('quem_veio_visitar')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Informações sobre o Veículo (opcional) -->
                    <div>
                        <label for="veiculo_tipo" class="block text-sm font-medium text-gray-700">Tipo do Veículo</label>
                        <input type="text" name="veiculo_tipo" id="veiculo_tipo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('veiculo_tipo') }}">
                    </div>

                    <div>
                        <label for="veiculo_marca" class="block text-sm font-medium text-gray-700">Marca do Veículo</label>
                        <input type="text" name="veiculo_marca" id="veiculo_marca" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('veiculo_marca') }}">
                    </div>

                    <div>
                        <label for="veiculo_modelo" class="block text-sm font-medium text-gray-700">Modelo do Veículo</label>
                        <input type="text" name="veiculo_modelo" id="veiculo_modelo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('veiculo_modelo') }}">
                    </div>

                    <div>
                        <label for="veiculo_placa" class="block text-sm font-medium text-gray-700">Placa do Veículo</label>
                        <input type="text" name="veiculo_placa" id="veiculo_placa" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('veiculo_placa') }}">
                    </div>

                </div>
            </div>
        </div>

        <!-- Botão de Salvar -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Cadastrar Visitante
            </button>
        </div>
    </form>
</div>
@endsection
