<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

# Allow these fields to be filled when creating/updating
    protected $fillable = ['name','description', 'profile_picture', 'admin_id'];

# Relationship: One club has many post 1:M
    public function posts ()
    {
        return $this->hasMany(Post::class);
    }

}
