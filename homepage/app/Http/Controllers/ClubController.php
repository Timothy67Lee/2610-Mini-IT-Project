<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Post;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        # Fetch all the clubs with their posts
        $posts = Post::with('club')->latest()->get();

        # Pass data to the homepage view
        return view('index', compact('posts'));
    }
    //
}
