@extends('layouts.main')

@section('title', 'Página Inicial')

@if(session('error'))
    <script>
        // Exibe o popup com a mensagem de erro
        alert("{{ session('error') }}");
    </script>
@endif


@section('content')
    <div class="bg-white p-6 shadow-md rounded mt-9 text-center max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6">Bem-vindo ao Siscontrec!</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Botão para a Home -->
            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-lg">
                Página Inicial
            </a>

            <!-- Botões do Perfil -->
            <a href="{{ route('profile.edit') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg text-lg">
                Editar Perfil
            </a>

            <form action="{{ route('profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg text-lg w-full">
                    Excluir Perfil
                </button>
            </form>

            <a href="{{ route('visitantes.create') }}" class="inline-block px-6 py-2 bg-green-500 text-white text-center rounded-md hover:bg-green-700">
    Cadastrar Visitante
</a>

<button type="button" class="btn btn-info" onclick="window.location.href='{{ route('visitantes.index') }}'">
    Listagem de visitantes
</button>


            @if (auth()->user()->access == 'Super-Usuario' || auth()->user()->access == 'Administrador')
                <a href="{{ route('operadores.create') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-3 px-4 rounded-lg text-lg w-full34sds">
                    Adicionar Operador
                </a>


            @endif
        </div>
    </div>
@endsection
