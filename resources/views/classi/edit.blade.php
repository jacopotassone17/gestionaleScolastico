@extends('layouts.app')

@section('title', 'Modifica Classe')

@section('content')
    <h2 class="text-xl font-bold mb-4">Modifica classe</h2>

    <form method="POST" action="{{ route('classi.update', $classe) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nome Classe</label>
            <input type="text" name="nome" value="{{ $classe->nome }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Sezione</label>
            <input type="text" name="sezione" value="{{ $classe->sezione }}" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Aggiorna</button>
    </form>
@endsection
