<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperiamo tutti i voti con i dati dello studente e del professore
        $grades = Grade::with('student', 'teacher')->get();

        // Passiamo i dati alla vista per visualizzarli
        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recuperiamo gli studenti e i professori per il modulo di creazione
        $students = Student::all();
        $teachers = Teacher::all();

        // Mostriamo il modulo per aggiungere un nuovo voto
        return view('grades.create', compact('students', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validiamo i dati del form
        $request->validate([
            'id_studente' => 'required|exists:student,id_studente',
            'materia' => 'required|string|max:45',
            'peso' => 'required|numeric|min:0|max:10',
            'id_professore' => 'required|exists:teacher,id_professore',
        ]);

        // Creiamo il voto con i dati ricevuti
        Grade::create([
            'id_studente' => $request->id_studente,
            'materia' => $request->materia,
            'peso' => $request->peso,
            'id_professore' => $request->id_professore,
        ]);

        // Reindirizziamo alla lista dei voti con un messaggio di successo
        return redirect()->route('grades.index')->with('success', 'Voto aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recuperiamo un voto specifico con i dettagli dello studente e del professore
        $grade = Grade::with('student', 'teacher')->findOrFail($id);

        // Passiamo i dati alla vista per visualizzarli
        return view('grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recuperiamo il voto da modificare
        $grade = Grade::findOrFail($id);

        // Recuperiamo gli studenti e i professori per il modulo di modifica
        $students = Student::all();
        $teachers = Teacher::all();

        // Mostriamo il modulo di modifica del voto
        return view('grades.edit', compact('grade', 'students', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validiamo i dati del form
        $request->validate([
            'id_studente' => 'required|exists:student,id_studente',
            'materia' => 'required|string|max:45',
            'peso' => 'required|numeric|min:0|max:10',
            'id_professore' => 'required|exists:teacher,id_professore',
        ]);

        // Recuperiamo il voto da aggiornare
        $grade = Grade::findOrFail($id);

        // Aggiorniamo il voto con i dati ricevuti
        $grade->update([
            'id_studente' => $request->id_studente,
            'materia' => $request->materia,
            'peso' => $request->peso,
            'id_professore' => $request->id_professore,
        ]);

        // Reindirizziamo alla lista dei voti con un messaggio di successo
        return redirect()->route('grades.index')->with('success', 'Voto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recuperiamo il voto da eliminare
        $grade = Grade::findOrFail($id);

        // Eliminiamo il voto dal database
        $grade->delete();

        // Reindirizziamo alla lista dei voti con un messaggio di successo
        return redirect()->route('grades.index')->with('success', 'Voto eliminato con successo!');
    }
}
