<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Nome della tabella
    protected $table = 'studente';
    protected $primaryKey = 'id_studente'; // La chiave primaria si chiama 'id_user' invece di 'id'

    // Colonne che possono essere assegnate in massa
    protected $fillable = [
        'nome',
        'cognome',
        'classe',
        'id_notifica',
        'id_utente',
    ];

    // Relazione con il modello Notifiche
    public function notification()
    {
        return $this->belongsTo(Notifiche::class, 'id_notifica');
    }

    // Relazione con il modello User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relazione con il modello Classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe');
    }

    // Relazione con il modello Grade
    public function grades()
    {
        return $this->hasMany(Grade::class, 'id_studente');
    }
}
