<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClaimComment extends Model
{
    use SoftDeletes;

    protected $table = 'claimcomments'; 
    protected $fillable = [
        'claim_id', // Clé étrangère pour lier le commentaire à une réclamation
        'comment_text',
        'comment_role',
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class, 'claim_id');
    }
    
}
