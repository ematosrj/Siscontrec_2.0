@extends('layouts.main')

@section('title', 'Mostrar Visitante')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mostrar Visitante</h2>

    <!-- Filtros -->
    <form method="GET" action="{{ route('visitantes.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="data_filter">Filtrar por Data:</label>
                <input type="date" name="data_filter" id="data_filter" class="form-control" value="{{ request()->get('data_filter') }}">
            </div>
            <div class="col-md-3">
                <label for="mes_filter">Filtrar por Mês:</label>
                <select name="mes_filter" id="mes_filter" class="form-control">
                    <option value="">Selecione o Mês</option>
                    <option value="1" {{ request()->get('mes_filter') == 1 ? 'selected' : '' }}>Janeiro</option>
                    <option value="2" {{ request()->get('mes_filter') == 2 ? 'selected' : '' }}>Fevereiro</option>
                    <option value="3" {{ request()->get('mes_filter') == 3 ? 'selected' : '' }}>Março</option>
                    <option value="4" {{ request()->get('mes_filter') == 4 ? 'selected' : '' }}>Abril</option>
                    <option value="5" {{ request()->get('mes_filter') == 5 ? 'selected' : '' }}>Maio</option>
                    <option value="6" {{ request()->get('mes_filter') == 6 ? 'selected' : '' }}>Junho</option>
                    <option value="7" {{ request()->get('mes_filter') == 7 ? 'selected' : '' }}>Julho</option>
                    <option value="8" {{ request()->get('mes_filter') == 8 ? 'selected' : '' }}>Agosto</option>
                    <option value="9" {{ request()->get('mes_filter') == 9 ? 'selected' : '' }}>Setembro</option>
                    <option value="10" {{ request()->get('mes_filter') == 10 ? 'selected' : '' }}>Outubro</option>
                    <option value="11" {{ request()->get('mes_filter') == 11 ? 'selected' : '' }}>Novembro</option>
                    <option value="12" {{ request()->get('mes_filter') == 12 ? 'selected' : '' }}>Dezembro</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="ano_filter">Filtrar por Ano:</label>
                <input type="number" name="ano_filter" id="ano_filter" class="form-control" value="{{ request()->get('ano_filter') }}" placeholder="Ano" min="2000" max="{{ date('Y') }}" step="1" onclick="showYearPicker()">
            </div>

            <!-- Script para abrir o seletor de ano -->
            <script>
                function showYearPicker() {
                    const input = document.getElementById('ano_filter');
                    let year = prompt("Escolha o ano:", input.value || new Date().getFullYear());
                    if (year && !isNaN(year)) {
                        input.value = year;
                    }
                }
            </script>

            <br>

            <div class="col-md-3 flex space-x-2">
                <button type="submit" class="btn btn-primary bg-blue-500 text-white p-2 rounded hover:bg-blue-600 text-sm">Filtrar</button>
                <a href="{{ route('login') }}" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600 text-sm">Voltar para Login</a>
            </div>
        </div>
    </form>

    <!-- Tabela de Visitantes -->
<!-- Tabela de Visitantes -->
<table class="table-auto border-separate border-spacing-2 w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border">Nome</th>
            <th class="px-4 py-2 border">Documento</th>
            <th class="px-4 py-2 border">Data/Hora Entrada</th>
            <th class="px-4 py-2 border">Quem Visitar</th>
            <th class="px-4 py-2 border">Veículo</th>
            <th class="px-4 py-2 border">Placa</th> <!-- Coluna para Placa -->
            <th class="px-4 py-2 border">OPM Visitada</th>
            <th class="px-4 py-2 border">Registrado por</th>
            @if ($user->isAdmin() || $user->isSuperUser())
                <th class="px-4 py-2 border">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($visitantes as $visitante)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 border">{{ $visitante->nome }}</td>
            <td class="px-4 py-2 border">{{ $visitante->documento }}</td>
            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($visitante->data_hora_entrada)->format('d/m/Y H:i') }}</td>
            <td class="px-4 py-2 border">{{ $visitante->quem_visitar }}</td>
            <td class="px-4 py-2 border">{{ $visitante->veiculo_tipo }} - {{ $visitante->veiculo_marca }} - {{ $visitante->placa }}</td>
            <td class="px-4 py-2 border">{{ $visitante->placa }}</td> <!-- Exibindo a placa -->
            <td class="px-4 py-2 border">{{ $visitante->opm_visitada_id }}</td>
            <td class="px-4 py-2 border">{{ $visitante->usuarioRegistrou->rank }} - {{ $visitante->usuarioRegistrou->name }}</td>
            @if ($user->isAdmin() || $user->isSuperUser())
            <td class="px-4 py-2 border">
                <!-- Botões em linha com o Tailwind -->
                <div class="flex space-x-2">
                    <!-- Botão de Editar -->
                    <a href="{{ route('visitantes.edit', $visitante->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">Editar</a>

                    <!-- Formulário para Excluir o Visitante -->
                    <form action="{{ route('visitantes.destroy', $visitante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">Excluir</button>
                    </form>

                    <!-- Formulário para Registrar a Saída -->
                    <form action="{{ route('visitantes.update', $visitante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')

                        <!-- Botão Registrar Saída -->
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200">Registrar Saída</button>
                    </form>
                </div>
            </td>
            @endif
        </tr>
        @empty
        <tr>
            <td colspan="8" class="px-4 py-2 border text-center">Nenhum visitante encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>


    <!-- Paginação -->
    {{ $visitantes->links() }}
</div>

<!-- Script de Popup se Nenhum Visitante for Encontrado -->
@if ($visitantes->isEmpty())
    <script>
        alert('Nenhum visitante encontrado para os filtros selecionados.');
    </script>
@endif
@endsection
