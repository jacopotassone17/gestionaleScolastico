@extends('layouts.app')

@section('title', 'Classi')

@section('content')
    <h2 class="text-xl font-bold mb-4">Elenco delle classi</h2>

    <a href="{{ route('classi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuova Classe</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Sezione</th>
                <th class="border px-4 py-2">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td class="border px-4 py-2">{{ $classe->id }}</td>
                    <td class="border px-4 py-2">{{ $classe->nome }}</td>
                    <td class="border px-4 py-2">{{ $classe->sezione }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('classi.edit', $classe) }}" class="text-blue-600">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
