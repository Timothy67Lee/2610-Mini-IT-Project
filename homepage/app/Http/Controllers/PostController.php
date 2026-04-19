<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('club')->latest()->get();
        return view('index', compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content'=> 'required|string',
            'club_id' => 'required|exists:clubs,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
           $validated['image'] = $request->file('image')->store('posts', 'public');


        }

        Post::create($validated);

        return redirect('/')->with('success',' Post Created Successfully');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('posts', 'public');
        $validated['image'] = $path;
    }

    $post->update($validated);
    {
    return redirect()->route('clubs.show', $post->club->id)
                 ->with('success', 'Post updated successfully!');

    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post ->delete();
        
         return redirect('/')->with('success', 'Post Deleted Successfully!');
    }
}


