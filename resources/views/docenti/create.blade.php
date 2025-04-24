@extends('layouts.app')

@section('title', 'Crea Docente')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Crea Nuovo Docente</h2>

    <form method="POST" action="{{ route('docenti.store') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nome e Cognome</label>
            <input type="text" id="name" name="name" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="materia" class="block font-semibold mb-1">Materia</label>
            <input type="text" id="materia" name="materia" class="border p-2 w-full rounded" required>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Salva</button>
    </form>
@endsection
