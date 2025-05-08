@extends('layouts.app')

@section('title', 'Docenti')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Elenco Docenti</h2>

    <a href="{{ route('docenti.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Nuovo Docente</a>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Nome</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Materia</th>
                    <th class="border border-gray-300 px-4 py-2">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docenti as $docente)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $docente->id_professore }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $docente->nome }} {{ $docente->cognome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $docente->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $docente->materia }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('docenti.show', $docente->id_professore) }}" class="text-green-600 hover:underline mr-2">Visualizza</a>
                        <a href="{{ route('docenti.edit', $docente->id_professore) }}" class="text-blue-600 hover:underline mr-2">Modifica</a>
                        <form method="POST" action="{{ route('docenti.destroy', $docente->id_professore) }}" class="inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo docente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Elimina</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
