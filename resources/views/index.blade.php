@extends('layouts.app')

@section('content')
    
<div class="sub-header">
        <h1>Explore My Clubs</h1>
    </div>
    <!-- Club cards -->
    <div class="club-grid">
        @foreach($clubs as $club)
            <div class="club-card">
                <a href="{{ route('clubs.show', $club->id) }}">
                    <img src="{{ asset('images/' . $club->profile_picture) }}" class="club-image-rect">
                    <h3>{{ $club->name }}</h3>
                    <p>{{ $club->description }}</p>
                </a>
            </div>
        @endforeach
    </div>

    <h2>Latest Posts</h2>

    <!-- Posts feed -->
    @forelse($posts as $post)
        <div class="post-card">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="post-image">
            @endif

            <small>Posted in: {{ $post->club->name }}</small>
        </div>
    @empty
        <p>No posts yet.</p>
    @endforelse

    <!-- Scroll-to-top button -->
<button id="scrollTopBtn" 
        class="fixed bottom-6 right-6 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hidden">
    ↑
</button>
@endsection

