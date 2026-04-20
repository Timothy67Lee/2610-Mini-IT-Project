<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Membership.php

use App\Models\User;
use App\Models\Club;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'club_id',
        'role',       // e.g., 'member', 'admin'
        'created_at', // if Laravel automatically sets it
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    // Each Membership row belongs to one user and one club

}