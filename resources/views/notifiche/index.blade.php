@extends('layouts.app')

@section('title', 'Notifiche')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Notifiche</h2>

    <form method="GET" action="{{ route('Notifiche.index') }}" class="mb-6">
        <div class="flex flex-wrap gap-4 items-end">

            <div>
                <label for="studente_id" class="block font-semibold mb-1">Studente</label>
                <select id="studente_id" name="studente_id" class="border p-2 rounded w-full">
                    <option value="">-- Tutti gli Studenti --</option>
                    @foreach ($studenti as $studente)
                        <option value="{{ $studente->id }}" {{ request('studente_id') == $studente->id ? 'selected' : '' }}>
                            {{ $studente->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="materia" class="block font-semibold mb-1">Materia</label>
                <input type="text" id="materia" name="materia" value="{{ request('materia') }}" class="border p-2 rounded w-full" placeholder="Es. Matematica">
            </div>

            <div>
                <label for="data_inizio" class="block font-semibold mb-1">Data Inizio</label>
                <input type="date" id="data_inizio" name="data_inizio" value="{{ request('data_inizio') }}" class="border p-2 rounded w-full">
            </div>

            <div>
                <label for="data_fine" class="block font-semibold mb-1">Data Fine</label>
                <input type="date" id="data_fine" name="data_fine" value="{{ request('data_fine') }}" class="border p-2 rounded w-full">
            </div>

            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Filtra</button>
            </div>
        </div>
    </form>

    @if($Notifica ?? false)
        <h3 class="text-xl font-bold mb-4">Risultati Notifiche</h3>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Studente</th>
                        <th class="border border-gray-300 px-4 py-2">Materia</th>
                        <th class="border border-gray-300 px-4 py-2">Voto</th>
                        <th class="border border-gray-300 px-4 py-2">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Notifica as $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->studente->name ?? 'N/A' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->materia }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->valore }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->data->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Nessun dato trovato</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif
@endsection
