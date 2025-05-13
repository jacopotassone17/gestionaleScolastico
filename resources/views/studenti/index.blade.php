<!-- resources/views/studenti/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Lista degli Studenti</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Classe</th>
                    <th>Email</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id_studente }}</td>
                        <td>{{ $student->nome }}</td>
                        <td>{{ $student->cognome }}</td>
                        <td>{{ $student->classe }}</td> <!-- Mostra direttamente la classe -->
                        <td>{{ $student->user->email ?? 'N/A' }}</td> <!-- Mostra email se esiste -->
                        <td>
                            <a href="{{ route('studenti.show', $student->id_studente) }}" class="btn btn-info">Visualizza</a>
                            <a href="{{ route('studenti.edit', $student->id_studente) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('studenti.destroy', $student->id_studente) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo studente?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('studenti.create') }}" class="btn btn-primary mt-4">Aggiungi Studente</a>
    </div>
@endsection
