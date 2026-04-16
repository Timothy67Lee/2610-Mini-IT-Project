<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Post;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function show($club)
    {
       
    return "This is the {$club} club page!";

    }
    //
}
