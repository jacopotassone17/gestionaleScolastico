@extends('layouts.app')

@section('title', 'Presenze')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Elenco Presenze</h2>

    <a href="{{ route('presenze.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Nuova Presenza</a>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Studente</th>
                    <th class="border border-gray-300 px-4 py-2">Data</th>
                    <th class="border border-gray-300 px-4 py-2">Presenza</th>
                    <th class="border border-gray-300 px-4 py-2">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presenze as $presenza)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $presenza->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presenza->studente->name ?? 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $presenza->data->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if($presenza->presente)
                            <span class="text-green-600 font-semibold">Presente</span>
                        @else
                            <span class="text-red-600 font-semibold">Assente</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('presenze.edit', $presenza->id) }}" class="text-blue-600 hover:underline mr-2">Modifica</a>
                        <form method="POST" action="{{ route('presenze.destroy', $presenza->id) }}" class="inline" onsubmit="return confirm('Sei sicuro di voler eliminare questa presenza?');">
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
