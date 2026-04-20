<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Event.php

use App\Models\Club;

class Event extends Model
{
    use HasFactory;

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');  // Each Event belongs to one Club (via club_id)
    }
}