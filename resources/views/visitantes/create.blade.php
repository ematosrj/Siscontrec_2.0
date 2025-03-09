@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Cadastrar Visitante</h1>
    
    <form action="{{ route('visitantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="form-group">
            <label for="documento">Documento</label>
            <input type="text" name="documento" id="documento" class="form-control" value="{{ old('documento') }}" required>
        </div>

        <div class="form-group">
            <label for="data_hora_entrada">Data e Hora de Entrada</label>
            <input type="datetime-local" name="data_hora_entrada" id="data_hora_entrada" class="form-control" value="{{ old('data_hora_entrada') }}" required>
        </div>

        <div class="form-group">
            <label for="data_hora_saida">Data e Hora de Saída</label>
            <input type="datetime-local" name="data_hora_saida" id="data_hora_saida" class="form-control" value="{{ old('data_hora_saida') }}">
        </div>

        <div class="form-group">
            <label for="quem_visitar">Quem Visitar</label>
            <input type="text" name="quem_visitar" id="quem_visitar" class="form-control" value="{{ old('quem_visitar') }}" required>
        </div>

        <select name="veiculo_tipo" id="veiculo_tipo" class="form-control" style="text-transform: uppercase;">
    <option value="motocicleta" {{ old('veiculo_tipo') == 'motocicleta' ? 'selected' : '' }}>Motocicleta</option>
    <option value="automovel" {{ old('veiculo_tipo') == 'automovel' ? 'selected' : '' }}>Automóvel</option>
    <option value="outros" {{ old('veiculo_tipo') == 'outros' ? 'selected' : '' }}>Outros</option>
</select>


        <div class="form-group">
            <label for="veiculo_marca">Marca do Veículo</label>
            <input type="text" name="veiculo_marca" id="veiculo_marca" class="form-control" value="{{ old('veiculo_marca') }}">
        </div>

        <div class="form-group">
            <label for="veiculo_modelo">Modelo do Veículo</label>
            <input type="text" name="veiculo_modelo" id="veiculo_modelo" class="form-control" value="{{ old('veiculo_modelo') }}">
        </div>

        <div class="form-group">
            <label for="placa">Placa do Veículo</label>
            <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa') }}">
        </div>

        <div class="form-group">
            <label for="opm_visitada_id">OPM Visitada</label>
            <input type="text" name="opm_visitada_id" id="opm_visitada_id" class="form-control" value="{{ old('opm_visitada_id') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Visitante</button>
    </form>
</div>
@endsection
