<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

// app/Models/Event.php

use App\Models\Club;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');  // Each Event belongs to one Club (via club_id)
    }
}

