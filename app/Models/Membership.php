<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 this is the correct HasFactory

use App\Models\User;
use App\Models\Club;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'club_id',
        'role',       // e.g., 'member', 'admin'
        'created_at', // Laravel usually sets this automatically, so you can remove if you want
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}