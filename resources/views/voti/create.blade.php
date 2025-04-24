@extends('layouts.app')

@section('title', 'Nuovo Voto')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Aggiungi Nuovo Voto</h2>

    <form method="POST" action="{{ route('voti.store') }}">
        @csrf

        <div class="mb-4">
            <label for="studente_id" class="block font-semibold mb-1">Studente</label>
            <select id="studente_id" name="studente_id" class="border p-2 w-full rounded" required>
                <option value="">-- Seleziona Studente --</option>
                @foreach ($studenti as $studente)
                    <option value="{{ $studente->id }}">{{ $studente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="materia" class="block font-semibold mb-1">Materia</label>
            <input type="text" id="materia" name="materia" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="valore" class="block font-semibold mb-1">Voto</label>
            <input type="number" step="0.01" min="0" max="10" id="valore" name="valore" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="data" class="block font-semibold mb-1">Data</label>
            <input type="date" id="data" name="data" class="border p-2 w-full rounded" required>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Salva</button>
    </form>
@endsection
