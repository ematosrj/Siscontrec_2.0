@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6">Adicionar Operador</h1>

        <form action="{{ route('operadores.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="registration_number" class="block text-sm font-medium text-gray-700">Número da matrícula</label>
                <input type="text" name="registration_number" id="registration_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('registration_number')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="rank" class="block text-sm font-medium text-gray-700">Selecione a hierarquia</label>
                <select name="rank" id="rank" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Selecione </option>
                    <option value="AL SD PM" {{ old('rank') == 'AL SD PM' ? 'selected' : '' }}>AL SD PM</option>
                    <option value="SD PM" {{ old('rank') == 'SD PM' ? 'selected' : '' }}>SD PM</option>
                    <option value="CB PM" {{ old('rank') == 'CB PM' ? 'selected' : '' }}>CB PM</option>
                    <option value="AL SGT PM" {{ old('rank') == 'AL SGT PM' ? 'selected' : '' }}>AL SGT PM</option>
                    <option value="SGT PM" {{ old('rank') == 'SGT PM' ? 'selected' : '' }}>SGT PM</option>
                    <option value="SUB TEN PM" {{ old('rank') == 'SUB TEN PM' ? 'selected' : '' }}>SUB TEN PM</option>
                    <option value="ALOF PM" {{ old('rank') == 'ALOF PM' ? 'selected' : '' }}>ALOF PM</option>
                    <option value="ASP PM" {{ old('rank') == 'ASP PM' ? 'selected' : '' }}>ASP PM</option>
                    <option value="TEN PM" {{ old('rank') == 'TEN PM' ? 'selected' : '' }}>TEN PM</option>
                    <option value="CAP PM" {{ old('rank') == 'CAP PM' ? 'selected' : '' }}>CAP PM</option>
                    <option value="MAJ PM" {{ old('rank') == 'MAJ PM' ? 'selected' : '' }}>MAJ PM</option>
                    <option value="TEN CEL PM" {{ old('rank') == 'TEN CEL PM' ? 'selected' : '' }}>TEN CEL PM</option>
                    <option value="CEL PM" {{ old('rank') == 'CEL PM' ? 'selected' : '' }}>CEL PM</option>
                </select>
                @error('rank')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}" 
                    required 
                    pattern="^[a-zA-Z0-9._%+-]+@pm\.ba\.gov\.br$"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    oninvalid="this.setCustomValidity('O e-mail deve terminar com @pm.ba.gov.br')"
                    oninput="this.setCustomValidity('')"
                >
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="access" class="block text-sm font-medium text-gray-700">Acesso</label>
                <select name="access" id="access" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="Super-Usuario" {{ old('access') == 'Super-Usuario' ? 'selected' : '' }}>Super-Usuário</option>
                    <option value="Administrador" {{ old('access') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="Operador" {{ old('access') == 'Operador' ? 'selected' : '' }}>Operador</option>
                </select>
                @error('access')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        minlength="8"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm pr-10"
                        oninvalid="this.setCustomValidity('A senha deve ter no mínimo 8 caracteres')"
                        oninput="this.setCustomValidity('')"
                    >
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 px-3 flex items-center">
                        👁️
                    </button>
                </div>
                @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <script>
                function togglePassword() {
                    let passwordField = document.getElementById('password');
                    if (passwordField.type === 'password') {
                        passwordField.type = 'text';
                    } else {
                        passwordField.type = 'password';
                    }
                }
            </script>

            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600">Salvar</button>
        </form>
    </div>
</div>
@endsection
