<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docenti = Teacher::with('user')->get();
        return view('docenti.index', compact('docenti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('docenti.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:utente,id_user',
            'nome' => 'required|string|max:45',
            'cognome' => 'required|string|max:45',
            'materia' => 'required|string|max:45',
            'seconda_materia' => 'nullable|string|max:45',
            'email' => 'required|email|max:45',
            'password' => 'required|string|min:6',
        ]);

        Teacher::create([
            'id_user' => $request->id_user,
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'materia' => $request->materia,
            'seconda_materia' => $request->seconda_materia,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('docenti.index')->with('success', 'Professore aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docente = Teacher::with('user')->findOrFail($id);
        return view('docenti.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docente = Teacher::findOrFail($id);
        $users = User::all();
        return view('docenti.edit', compact('docente', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_professore)
    {
        $request->validate([
            'id_professore' => 'required|exists:utente,id_professore',
            'nome' => 'required|string|max:45',
            'cognome' => 'required|string|max:45',
            'materia' => 'required|string|max:45',
            'seconda_materia' => 'nullable|string|max:45',
            'email' => 'required|email|max:45',
            'password' => 'nullable|string|min:6',
        ]);

        $docente = Teacher::findOrFail($id_professore);

        $docente->update([
            'id_professore' => $request->id_professore,
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'materia' => $request->materia,
            'seconda_materia' => $request->seconda_materia,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $docente->password,
        ]);

        return redirect()->route('docenti.index')->with('success', 'Professore aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docente = Teacher::findOrFail($id);
        $docente->delete();
        return redirect()->route('docenti.index')->with('success', 'Professore eliminato con successo!');
    }
}
