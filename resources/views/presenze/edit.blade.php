@extends('layouts.app')

@section('title', 'Modifica Presenza')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Modifica Presenza</h2>

    <form method="POST" action="{{ route('presenze.update', $presenza->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="studente_id" class="block font-semibold mb-1">Studente</label>
            <select id="studente_id" name="studente_id" class="border p-2 w-full rounded" required>
                @foreach ($studenti as $studente)
                    <option value="{{ $studente->id }}" {{ $studente->id == $presenza->studente_id ? 'selected' : '' }}>{{ $studente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="data" class="block font-semibold mb-1">Data</label>
            <input type="date" id="data" name="data" value="{{ $presenza->data->format('Y-m-d') }}" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Presenza</label>
            <label class="inline-flex items-center mr-4">
                <input type="radio" name="presente" value="1" {{ $presenza->presente ? 'checked' : '' }}>
                <span class="ml-2">Presente</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="presente" value="0" {{ !$presenza->presente ? 'checked' : '' }}>
                <span class="ml-2">Assente</span>
            </label>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Aggiorna</button>
    </form>
@endsection
