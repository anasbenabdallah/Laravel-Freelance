<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';

    protected $dates = [
        'DateDebut',
        'DateFin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titre',
        'Description',
        'DateDebut',
        'DateFin',
        'Budget',
        'competences',
        'etat',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'id_project');
    }
}
