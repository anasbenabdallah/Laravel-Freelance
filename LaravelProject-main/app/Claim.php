<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    use SoftDeletes;

    protected $table = 'claims'; // Specify the table name

    protected $fillable = [
        'claim_mail',
        'claim_title',
        'claim_details',
        'claim_status',
        'claim_rating',


        // Add other fields as needed
    ];

    protected $attributes = [
        'claim_status' => 0,
    ];
    

    public function comments()
    {
        return $this->hasMany(ClaimComment::class, 'claim_id');
    }


    public function user()
{
    return $this->belongsTo(User::class, 'claim_mail', 'email');
}

}
