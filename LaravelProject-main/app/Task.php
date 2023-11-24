<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';

    protected $dates = [
        'datedebut',
        'datefin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'datedebut',
        'datefin',
        'etattache',
        'id_project',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
