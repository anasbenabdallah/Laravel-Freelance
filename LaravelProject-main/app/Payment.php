<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount', 'payment_date', 'facture_id', 'mode_de_paiment'];

    // Define a relationship with Facture
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
    use HasFactory;
}
