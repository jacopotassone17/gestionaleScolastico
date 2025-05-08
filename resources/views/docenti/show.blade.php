@extends('layouts.app')

@section('title', 'Dettagli Docente')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Dettagli Docente</h2>

    <div class="space-y-2">
        <p><strong>Nome:</strong> {{ $docente->nome }}</p>
        <p><strong>Cognome:</strong> {{ $docente->cognome }}</p>
        <p><strong>Email:</strong> {{ $docente->email }}</p>
        <p><strong>Materia:</strong> {{ $docente->materia }}</p>
        @if($docente->seconda_materia)
            <p><strong>Seconda materia:</strong> {{ $docente->seconda_materia }}</p>
        @endif
        @if($docente->user)
            <p><strong>Utente associato:</strong> {{ $docente->user->name }}</p>
        @endif
    </div>

    <a href="{{ route('docenti.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">← Torna alla lista docenti</a>
@endsection
