<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'titre', 'commentaire', 'etudes', 'competences', 'periode', 'remuneration'
    ];

    // Si vous souhaitez utiliser la date de création et de mise à jour
    public $timestamps = true;
    use HasFactory;
    public function contrat() {
        return $this->hasOne(Contrat::class);
    }
    

}
