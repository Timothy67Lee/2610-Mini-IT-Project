<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Event;
use App\Models\Membership;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'owner_id',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'club_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'memberships', 'club_id', 'user_id')
                    ->withPivot('role', 'status', 'verification', 'created_at');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'club_id', 'id');
    }
}