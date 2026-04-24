@extends('layouts.app')

@section('content')
   <!-- Sub-header (page title strip) -->
    <div class="sub-header">
        <h1>{{ $club->name }}</h1>
        
    </div>



    <!-- Club card -->
    <div class="club-card-header">
        <img src="{{ asset('images/' . $club->profile_picture) }}" class="club-image-rect">
        <p class="club-description">{{ $club->description }}</p>
        <a href="{{ route('posts.create', $club->id) }}" class="btn btn-blue">Create Post</a>
    </div>

    <h2 class="posts-title">Posts</h2>

    @forelse($club->posts as $post)
        <div class="post-card">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="post-image">
            @endif

            <div class="mt-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-green">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-red">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No posts yet for this club.</p>
    @endforelse
@endsection
