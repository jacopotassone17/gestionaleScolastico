@extends('layouts.app')

@section('title', 'Voti')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Elenco Voti</h2>

    <a href="{{ route('voti.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Nuovo Voto</a>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Studente</th>
                    <th class="border border-gray-300 px-4 py-2">Materia</th>
                    <th class="border border-gray-300 px-4 py-2">Voto</th>
                    <th class="border border-gray-300 px-4 py-2">Data</th>
                    <th class="border border-gray-300 px-4 py-2">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voti as $voto)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $voto->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $voto->studente->name ?? 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $voto->materia }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $voto->valore }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $voto->data->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('voti.edit', $voto->id) }}" class="text-blue-600 hover:underline mr-2">Modifica</a>
                        <form method="POST" action="{{ route('voti.destroy', $voto->id) }}" class="inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo voto?');">
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
