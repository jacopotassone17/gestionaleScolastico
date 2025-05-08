<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Classe;
use App\Models\Notifiche;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperiamo tutti gli studenti con le informazioni dell'utente e della classe associata
        $students = Student::with(['user', 'classe', 'notifica'])->get();

        // Passiamo i dati alla vista per visualizzarli
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recuperiamo tutti gli utenti e le classi per il modulo di creazione
        $users = User::all();
        $classes = Classe::all();
        $notifications = Notifiche::all();

        // Mostriamo il modulo per aggiungere un nuovo studente
        return view('students.create', compact('users', 'classes', 'notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validiamo i dati del form
        $request->validate([
            'id_user' => 'required|exists:utente,id_user',
            'nome' => 'required|string|max:45',
            'cognome' => 'required|string|max:45',
            'classe' => 'required|exists:classe,id_classe',
            'id_notifica' => 'nullable|exists:notifiche,id_notifica',
        ]);

        // Creiamo il nuovo studente con i dati ricevuti
        Student::create([
            'id_user' => $request->id_user,
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'classe' => $request->classe,
            'id_notifica' => $request->id_notifica,
        ]);

        // Reindirizziamo alla lista degli studenti con un messaggio di successo
        return redirect()->route('students.index')->with('success', 'Studente aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recuperiamo lo studente specifico con le informazioni dell'utente, della classe e della notifica associata
        $student = Student::with(['user', 'classe', 'notifica'])->findOrFail($id);

        // Passiamo i dati alla vista per visualizzarli
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recuperiamo lo studente da modificare
        $student = Student::findOrFail($id);

        // Recuperiamo tutti gli utenti, le classi e le notifiche per il modulo di modifica
        $users = User::all();
        $classes = Classe::all();
        $notifications = Notifiche::all();

        // Mostriamo il modulo di modifica dello studente
        return view('students.edit', compact('student', 'users', 'classes', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validiamo i dati del form
        $request->validate([
            'id_user' => 'required|exists:utente,id_user',
            'nome' => 'required|string|max:45',
            'cognome' => 'required|string|max:45',
            'classe' => 'required|exists:classe,id_classe',
            'id_notifica' => 'nullable|exists:notifiche,id_notifica',
        ]);

        // Recuperiamo lo studente da aggiornare
        $student = Student::findOrFail($id);

        // Aggiorniamo i dati dello studente
        $student->update([
            'id_user' => $request->id_user,
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'classe' => $request->classe,
            'id_notifica' => $request->id_notifica,
        ]);

        // Reindirizziamo alla lista degli studenti con un messaggio di successo
        return redirect()->route('students.index')->with('success', 'Studente aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recuperiamo lo studente da eliminare
        $student = Student::findOrFail($id);

        // Eliminiamo lo studente dal database
        $student->delete();

        // Reindirizziamo alla lista degli studenti con un messaggio di successo
        return redirect()->route('students.index')->with('success', 'Studente eliminato con successo!');
    }
}
