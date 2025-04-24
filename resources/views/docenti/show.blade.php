@extends('layouts.app')

@section('title', 'Dettagli Docente')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Dettagli Docente</h2>

    <p><strong>Nome e Cognome:</strong> {{ $docente->name }}</p>
    <p><strong>Email:</strong> {{ $docente->email }}</p>
    <p><strong>Materia:</strong> {{ $docente->materia }}</p>

    <a href="{{ route('docenti.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">Torna alla lista docenti</a>
@endsection
