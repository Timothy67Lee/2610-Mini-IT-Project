<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Club.php

use App\Models\User;
use App\Models\Event;
use App\Models\Membership;

class Club extends Model
{
    use HasFactory;

    public function memberships()
    {
        return $this->hasMany(Membership::class); // A Club has many Membership rows linked to it (via club_id)
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'memberships')
                ->withPivot('role', 'created_at');
}

    public function events()
    {
        return $this->hasMany(Event::class); // A Club has many Events (one event → one club)
    }
}
