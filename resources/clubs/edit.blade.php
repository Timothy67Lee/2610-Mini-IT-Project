@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Club Info Card -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-bold mb-2">{{ $club->name }}</h2>
        <p class="text-gray-700 mb-4">{{ $club->description }}</p>

        @if($club->profile_picture)
            <img src="{{ asset('storage/images/' . $club->profile_picture) }}" 
                 alt="{{ $club->name }}" 
                 class="w-48 h-48 object-cover rounded mb-4">
        @endif

        <!-- Club Management Buttons INSIDE the club card -->
        <div class="flex gap-4 mt-4">
            <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-blue">Edit Club</a>

            <form action="{{ route('clubs.destroy', $club->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this club?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-red">Delete Club</button>
            </form>
        </div>
    </div>

    <!-- Posts Section -->
    <h3 class="text-xl font-semibold mb-4">Posts</h3>
    @forelse ($club->posts as $post)
        <div class="bg-red-100 shadow-md rounded-lg p-4 mb-4">
            <h4 class="font-bold">{{ $post->title }}</h4>
            <p>{{ $post->content }}</p>

            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-blue">Edit Post</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-red">Delete Post</button>
            </form>
        </div>
    @empty
        <p>No posts yet.</p>
    @endforelse
</div>
@endsection
