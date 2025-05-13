@extends('layouts.app')

@section('title', 'Crea Studente')

@section('content')
    <h2 class="text-xl font-bold mb-4">Crea nuovo studente</h2>

    <form method="POST" action="{{ route('studenti.store') }}">
        @csrf
        <div class="mb-4">
            <label for="nome" class="block">Nome</label>
            <input type="text" name="nome" id="nome" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="cognome" class="block">Cognome</label>
            <input type="text" name="cognome" id="cognome" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="classe" class="block">Classe</label>
            <select name="classe" id="classe" class="border p-2 w-full" required>
                <option value="">Seleziona Classe</option>
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id_classe }}">{{ $classe->nome }} {{ $classe->sezione }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_notifica" class="block">Notifica</label>
            <select name="id_notifica" id="id_notifica" class="border p-2 w-full">
                <option value="">Seleziona Notifica</option>
                @foreach ($notifications as $notifica)
                    <option value="{{ $notifica->id_notifica }}">{{ $notifica->contenuto }}</option>
                @endforeach
            </select>
        </div>

        </br> 
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salva</button>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Test Bottone</button>

    </form>
@endsection
