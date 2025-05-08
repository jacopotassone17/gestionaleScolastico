<div class="mb-4">
    <label for="nome" class="block font-semibold mb-1">Nome</label>
    <input type="text" id="nome" name="nome" value="{{ $docente->nome }}" class="border p-2 w-full rounded" required>
</div>

<div class="mb-4">
    <label for="cognome" class="block font-semibold mb-1">Cognome</label>
    <input type="text" id="cognome" name="cognome" value="{{ $docente->cognome }}" class="border p-2 w-full rounded" required>
</div>

<div class="mb-4">
    <label for="email" class="block font-semibold mb-1">Email</label>
    <input type="email" id="email" name="email" value="{{ $docente->email }}" class="border p-2 w-full rounded" required>
</div>

<div class="mb-4">
    <label for="materia" class="block font-semibold mb-1">Materia</label>
    <input type="text" id="materia" name="materia" value="{{ $docente->materia }}" class="border p-2 w-full rounded" required>
</div>
