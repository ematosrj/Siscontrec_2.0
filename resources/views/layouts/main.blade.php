<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
    @include('layouts.navigation')


        <main class="p-6">
            @yield('content')
        </main>

        <footer class="bg-black text-white text-center font-bold text-1xl py-4 w-full fixed bottom-0">
            <p>Siscontrec - &copy; Polícia Militar do Estado da Bahia</p>
        </footer>
    </div>
</body>
</html>
