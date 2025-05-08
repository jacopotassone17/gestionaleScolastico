<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Nome della tabella
    protected $table = 'professore';
    protected $primaryKey = 'id_professore'; // La chiave primaria si chiama 'id_user' invece di 'id'

    // Colonne che possono essere assegnate in massa
    protected $fillable = [
        'id_utente',
        'nome',
        'cognome',
        'materia',
        'seconda_materia',
        'email',
        'password',
    ];

    // Relazione con il modello User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relazione con il modello Classe
    public function classes()
    {
        return $this->hasMany(Classe::class, 'id_professore');
    }

    // Relazione con il modello Grade
    public function grades()
    {
        return $this->hasMany(Grade::class, 'id_professore');
    }
}
