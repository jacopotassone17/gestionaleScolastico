<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    // Nome della tabella
    protected $table = 'voto';
    protected $primaryKey = 'id_voto'; // La chiave primaria si chiama 'id_user' invece di 'id'

    // Colonne che possono essere assegnate in massa
    protected $fillable = [
        'id_studente',
        'materia',
        'peso',
        'id_professore',
    ];

    // Relazione con il modello Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_studente');
    }

    // Relazione con il modello Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_professore');
    }
}
