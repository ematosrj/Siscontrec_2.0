@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Adicionar Operador</h1>

        <form action="{{ route('operadores.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="hierarquia" class="block text-sm font-medium text-gray-700">Hierarquia</label>
                <input type="text" name="hierarquia" id="hierarquia" value="{{ old('hierarquia') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('hierarquia')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('nome')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="acesso" class="block text-sm font-medium text-gray-700">Acesso</label>
                <select name="acesso" id="acesso" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="Super-Usuario" {{ old('acesso') == 'Super-Usuario' ? 'selected' : '' }}>Super-Usuário</option>
                    <option value="Administrador" {{ old('acesso') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="Operador" {{ old('acesso') == 'Operador' ? 'selected' : '' }}>Operador</option>
                </select>
                @error('acesso')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600">Salvar</button>
        </form>
    </div>
</div>
@endsection
