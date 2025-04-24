@extends('layouts.app')

@section('title', 'Modifica Studente')

@section('content')
    <h2 class="text-xl font-bold mb-4">Modifica studente</h2>

    <form method="POST" action="{{ route('studenti.update', $studente->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $studente->nome }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="cognome" class="block">Cognome</label>
            <input type="text" name="cognome" id="cognome" value="{{ $studente->cognome }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="classe_id" class="block">Classe</label>
            <select name="classe_id" id="classe_id" class="border p-2 w-full" required>
                @foreach ($classi as $classe)
                    <option value="{{ $classe->id }}" {{ $studente->classe_id == $classe->id ? 'selected' : '' }}>
                        {{ $classe->nome }} {{ $classe->sezione }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Aggiorna</button>
    </form>
@endsection
