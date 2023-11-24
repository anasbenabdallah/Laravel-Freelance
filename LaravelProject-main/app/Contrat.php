<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    

    // Les attributs du modèle qui sont assignables.
    protected $fillable = [
        'titre',
        'poste',
        'date_debut',
        'date_fin',
        'remuneration',
        'remarque',
    ];
    public $timestamps = true;
    use HasFactory;
    public function offre() {
        return $this->belongsTo(Offre::class);
    }
}
