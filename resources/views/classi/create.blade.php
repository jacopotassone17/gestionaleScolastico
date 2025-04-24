@extends('layouts.app')

@section('title', 'Crea Classe')

@section('content')
    <h2 class="text-xl font-bold mb-4">Crea nuova classe</h2>

    <form method="POST" action="{{ route('classi.store') }}">
        @csrf
        <div class="mb-4">
            <label>Nome Classe</label>
            <input type="text" name="nome" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Sezione</label>
            <input type="text" name="sezione" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salva</button>
    </form> 
@endsection
