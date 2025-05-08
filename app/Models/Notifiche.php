<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifiche extends Model
{
    use HasFactory;

    // Nome della tabella
    protected $table = 'notifiche';

    // Colonne che possono essere assegnate in massa
    protected $fillable = [
        'nota',
        'circolare',
    ];

    // Relazione con il modello Student
    public function students()
    {
        return $this->hasMany(Student::class, 'id_notifica');
    }
}
