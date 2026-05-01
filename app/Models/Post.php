<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'club_id', 'user_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}

