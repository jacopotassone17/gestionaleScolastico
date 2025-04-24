@extends('layouts.app')

@section('title', 'Modifica Voto')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Modifica Voto</h2>

    <form method="POST" action="{{ route('voti.update', $voto->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="studente_id" class="block font-semibold mb-1">Studente</label>
            <select id="studente_id" name="studente_id" class="border p-2 w-full rounded" required>
                @foreach ($studenti as $studente)
                    <option value="{{ $studente->id }}" {{ $studente->id == $voto->studente_id ? 'selected' : '' }}>{{ $studente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="materia" class="block font-semibold mb-1">Materia</label>
            <input type="text" id="materia" name="materia" value="{{ $voto->materia }}" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="valore" class="block font-semibold mb-1">Voto</label>
            <input type="number" step="0.01" min="0" max="10" id="valore" name="valore" value="{{ $voto->valore }}" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label for="data" class="block font-semibold mb-1">Data</label>
            <input type="date" id="data" name="data" value="{{ $voto->data->format('Y-m-d') }}" class="border p-2 w-full rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Aggiorna</button>
    </form>
@endsection
