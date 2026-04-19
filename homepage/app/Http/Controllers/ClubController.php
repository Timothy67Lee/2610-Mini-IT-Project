<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Post;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    // Homepage: list all clubs and posts
    public function index()
    {
        // Get all clubs with their posts
        $clubs = Club::with('posts')->get();

        // Get all posts for the homepage feed
        $posts = Post::with('club')->latest()->get();

        // Pass both variables to the view
        return view('index', compact('clubs', 'posts'));
    }

    public function edit($id)
{
    $club = Club::findOrFail($id);
    return view('clubs.edit', compact('club'));
}

public function update(Request $request, $id)
{
    $club = Club::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        $filename = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->storeAs('public/images', $filename);
        $club->profile_picture = $filename;
    }

    $club->name = $request->name;
    $club->description = $request->description;
    $club->save();

    return redirect()->route('clubs.show', $club->id)
                     ->with('success', 'Club updated successfully!');
}


    // Show a single club page
    public function show(Club $club)
{
    $club->load('posts'); // eager load posts
   return view('clubs.show', compact('club'));

}

public function destroy($id)
{
    $club = Club::findOrFail($id);
    $club->delete();

    return redirect()->route('clubs.index')
                     ->with('success', 'Club deleted successfully!');
}


}
