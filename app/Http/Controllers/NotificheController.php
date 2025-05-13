<?php

namespace App\Http\Controllers;

use App\Models\Notifiche;
use Illuminate\Http\Request;

class NotificheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperiamo tutte le notifiche
        $notifica = Notifiche::all();

        // Passiamo i dati alla vista per visualizzarli
        return view('notifiche.index', compact('notifiche'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostriamo il modulo per aggiungere una nuova notifica
        return view('notifiche.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validiamo i dati del form
        $request->validate([
            'nota' => 'required|string|max:100',
            'circolare' => 'required|string|max:100',
        ]);

        // Creiamo la notifica con i dati ricevuti
        Notifiche::create([
            'nota' => $request->nota,
            'circolare' => $request->circolare,
        ]);

        // Reindirizziamo alla lista delle notifiche con un messaggio di successo
        return redirect()->route('notifiche.index')->with('success', 'Notifica aggiunta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_notifica)
    {
        // Recuperiamo una notifica specifica
        $notifica = Notifiche::findOrFail($id_notifica);

        // Passiamo i dati alla vista per visualizzarli
        return view('notifiche.show', compact('notifica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_notifica)
    {
        // Recuperiamo la notifica da modificare
        $notifica = Notifiche::findOrFail($id_notifica);

        // Mostriamo il modulo di modifica della notifica
        return view('notifiche.edit', compact('notifica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_notifica)
    {
        // Validiamo i dati del form
        $request->validate([
            'nota' => 'required|string|max:100',
            'circolare' => 'required|string|max:100',
        ]);

        // Recuperiamo la notifica da aggiornare
        $notifica = Notifiche::findOrFail($id_notifica);

        // Aggiorniamo la notifica con i dati ricevuti
        $notifica->update([
            'nota' => $request->nota,
            'circolare' => $request->circolare,
        ]);

        // Reindirizziamo alla lista delle notifiche con un messaggio di successo
        return redirect()->route('notifiche.index')->with('success', 'Notifica aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_notifica)
    {
        // Recuperiamo la notifica da eliminare
        $notifica = Notifiche::findOrFail($id_notifica);

        // Eliminiamo la notifica dal database
        $notifica->delete();

        // Reindirizziamo alla lista delle notifiche con un messaggio di successo
        return redirect()->route('notifiche.index')->with('success', 'Notifica eliminata con successo!');
    }
}
