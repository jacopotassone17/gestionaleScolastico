@extends('layouts.app')

@section('title', 'Dettaglio Studente')

@section('content')
    <h2 class="text-xl font-bold mb-4">Dati Studente</h2>

    <p><strong>Nome:</strong> {{ $studente->user->name }}</p>
    <p><strong>Email:</strong> {{ $studente->user->email }}</p>
    <p><strong>Classe:</strong> {{ $studente->classe->nome }}</p>

    <h3 class="text-lg font-semibold mt-6">Voti</h3>
    <ul>
        @foreach ($studente->voti as $voto)
            <li>{{ $voto->materia->nome }}: {{ $voto->valore }} ({{ $voto->data }})</li>
        @endforeach
    </ul>

    <h3 class="text-lg font-semibold mt-6">Presenze</h3>
    <ul>
        @foreach ($studente->presenze as $presenza)
            <li>{{ $presenza->data }} - {{ $presenza->stato }}</li>
        @endforeach
    </ul>
@endsection
