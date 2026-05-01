<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;
use App\Models\Club;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'club_id',
        'role',
        'status',
        'verification',
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

