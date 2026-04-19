@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Club Card -->
    <div class="bg-red-100 shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-bold mb-2">{{ $club->name }}</h2>
        <p class="text-gray-700 mb-4">{{ $club->description }}</p>

        @if($club->profile_picture)
            <img src="/images/{{ $club->profile_picture }}" 
                 alt="{{ $club->name }}" 
                 class="w-48 h-48 object-cover rounded mb-4">
        @endif

        <!-- Posts Section -->
        <div class="mt-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Posts</h3>
                <a href="{{ route('posts.create', ['club_id' => $club->id]) }}" class="btn btn-green">Create Post</a>
            </div>

            @forelse ($club->posts as $post)
    <div class="post-card">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
            class="post-image">
        @endif

        <div class="content">
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->content }}</p>

            <div class="actions">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-blue">Edit Post</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-red">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <p>No posts yet.</p>
@endforelse

            

