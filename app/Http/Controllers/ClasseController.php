<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperiamo tutte le classi con gli studenti e i professori associati
        $classes = Classe::with('students', 'teacher')->get();

        // Passiamo i dati alla vista per visualizzarli
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recuperiamo gli studenti e i professori per il modulo di creazione
        $students = Student::all();
        $teachers = Teacher::all();

        // Mostriamo il modulo per aggiungere una nuova classe
        return view('classes.create', compact('students', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validiamo i dati del form
        $request->validate([
            'nome' => 'required|string|max:45',
            'id_studente' => 'required|exists:student,id_studente',
            'id_professore' => 'required|exists:teacher,id_professore',
        ]);

        // Creiamo la classe con i dati ricevuti
        Classe::create([
            'nome' => $request->nome,
            'id_studente' => $request->id_studente,
            'id_professore' => $request->id_professore,
        ]);

        // Reindirizziamo alla lista delle classi con un messaggio di successo
        return redirect()->route('classes.index')->with('success', 'Classe aggiunta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recuperiamo una classe specifica con gli studenti e i professori associati
        $classe = Classe::with('students', 'teacher')->findOrFail($id);

        // Passiamo i dati alla vista per visualizzarli
        return view('classes.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recuperiamo la classe da modificare
        $classe = Classe::findOrFail($id);

        // Recuperiamo gli studenti e i professori per il modulo di modifica
        $students = Student::all();
        $teachers = Teacher::all();

        // Mostriamo il modulo di modifica della classe
        return view('classes.edit', compact('classe', 'students', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validiamo i dati del form
        $request->validate([
            'nome' => 'required|string|max:45',
            'id_studente' => 'required|exists:student,id_studente',
            'id_professore' => 'required|exists:teacher,id_professore',
        ]);

        // Recuperiamo la classe da aggiornare
        $classe = Classe::findOrFail($id);

        // Aggiorniamo la classe con i dati ricevuti
        $classe->update([
            'nome' => $request->nome,
            'id_studente' => $request->id_studente,
            'id_professore' => $request->id_professore,
        ]);

        // Reindirizziamo alla lista delle classi con un messaggio di successo
        return redirect()->route('classes.index')->with('success', 'Classe aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recuperiamo la classe da eliminare
        $classe = Classe::findOrFail($id);

        // Eliminiamo la classe dal database
        $classe->delete();

        // Reindirizziamo alla lista delle classi con un messaggio di successo
        return redirect()->route('classes.index')->with('success', 'Classe eliminata con successo!');
    }
}
