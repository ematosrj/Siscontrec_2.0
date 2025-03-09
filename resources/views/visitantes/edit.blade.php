@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Editar Visitante</h2>
    <form action="{{ route('visitantes.update', $visitante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $visitante->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="documento" class="form-label">Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" value="{{ old('documento', $visitante->documento) }}" required>
        </div>

        <div class="mb-3">
            <label for="data_hora_entrada" class="form-label">Data e Hora de Entrada</label>
            <input type="datetime-local" class="form-control" id="data_hora_entrada" name="data_hora_entrada" value="{{ old('data_hora_entrada', $visitante->data_hora_entrada) }}" required>
        </div>

        <div class="mb-3">
            <label for="data_hora_saida" class="form-label">Data e Hora de Saída</label>
            <input type="datetime-local" class="form-control" id="data_hora_saida" name="data_hora_saida" value="{{ old('data_hora_saida', $visitante->data_hora_saida) }}">
        </div>

        <div class="mb-3">
            <label for="quem_visitar" class="form-label">Quem Visitar</label>
            <input type="text" class="form-control" id="quem_visitar" name="quem_visitar" value="{{ old('quem_visitar', $visitante->quem_visitar) }}" required>
        </div>

        <div class="mb-3">
            <label for="veiculo_marca" class="form-label">Marca do Veículo</label>
            <input type="text" class="form-control" id="veiculo_marca" name="veiculo_marca" value="{{ old('veiculo_marca', $visitante->veiculo_marca) }}">
        </div>

        <div class="mb-3">
            <label for="veiculo_modelo" class="form-label">Modelo do Veículo</label>
            <input type="text" class="form-control" id="veiculo_modelo" name="veiculo_modelo" value="{{ old('veiculo_modelo', $visitante->veiculo_modelo) }}">
        </div>

        <div class="mb-3">
            <label for="veiculo_tipo" class="form-label">Tipo de Veículo</label>
            <input type="text" class="form-control" id="veiculo_tipo" name="veiculo_tipo" value="{{ old('veiculo_tipo', $visitante->veiculo_tipo) }}">
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa do Veículo</label>
            <input type="text" class="form-control" id="placa" name="placa" value="{{ old('placa', $visitante->placa) }}">
        </div>

        <div class="mb-3">
            <label for="opm_visitada_id" class="form-label">OPM Visitada</label>
            <input type="text" class="form-control" id="opm_visitada_id" name="opm_visitada_id" value="{{ old('opm_visitada_id', $visitante->opm_visitada_id) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar Visitante</button>
    </form>
</div>
@endsection
