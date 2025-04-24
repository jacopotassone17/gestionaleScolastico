@extends('layouts.app')

@section('title', 'Modifica Docente')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Modifica Docente</h2>

    <form method="POST" action="{{ route('docenti.update', $docente->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nome e Cognome</label>
            <input type="text" id="name" name="name" value="{{ $docente->name }}" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ $docente->email }}" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="materia" class="block font-semibold mb-1">Materia</label>
            <input type="text" id="materia" name="materia" value="{{ $docente->materia }}" class="border p-2 w-full rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Aggiorna</button>
    </form>
@endsection
