@extends('layouts.app')

@section('title', 'Nuova Presenza')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Aggiungi Nuova Presenza</h2>

    <form method="POST" action="{{ route('presenze.store') }}">
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
            <label for="data" class="block font-semibold mb-1">Data</label>
            <input type="date" id="data" name="data" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Presenza</label>
            <label class="inline-flex items-center mr-4">
                <input type="radio" name="presente" value="1" checked>
                <span class="ml-2">Presente</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="presente" value="0">
                <span class="ml-2">Assente</span>
            </label>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Salva</button>
    </form>
@endsection
