<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'client',
        'caissier',
        'Montant',
        'Etat',
        'date',
    ];
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    use HasFactory;
}
