<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestionale Scolastico')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between">
            <span class="font-bold">Gestionale Scolastico</span>
            <div>
                <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
                <a href="{{ route('classi.index') }}" class="mr-4">Classi</a>
                <a href="{{ route('studenti.index') }}" class="mr-4">Studenti</a>
                <a href="{{ route('docenti.index') }}" class="mr-4">Docenti</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        @yield('content')
    </div>
</body>
</html>
