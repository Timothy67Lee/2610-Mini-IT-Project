<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    # Allowing clubs to post posts
     protected $fillable = ['title', 'content', 'image', 'club_id'];
    
   # Relationship: 1:M each post belongs to one club
   public function club()
   {
    return $this->belongsTo(Club::class);
   }
}
