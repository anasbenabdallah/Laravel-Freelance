<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs'; // Specify the table name

    protected $fillable = ['title', 'description', 'user_id', 'image'];

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the user that created the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
