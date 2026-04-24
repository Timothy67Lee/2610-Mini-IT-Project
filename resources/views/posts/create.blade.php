@extends('layouts.app')

@section('content')

<header class="page-header">
        <h1>CREATE YOUR NEW POST</h1>
    </header>

    <div class="form-container">
        <h1 class="form-title">✍️ Create a New Post</h1>
        <p class="form-subtitle">Share your thoughts, updates, or announcements with your club members.</p>

        <form action="{{ route('posts.store', $club->id) }}" method="POST" enctype="multipart/form-data" class="styled-form">
            @csrf

            <!-- Title -->
            <div class="form-group">
                <label for="title">Post Title *</label>
                <input type="text" id="title" name="title" placeholder="Enter a catchy title" value="{{ old('title') }}">
            </div>

            <!-- Content -->
            <div class="form-group">
                <label for="content">Content *</label>
                <textarea id="content" name="content" rows="5" placeholder="Write your post here...">{{ old('content') }}</textarea>
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image">
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-submit">🚀 Publish Post</button>
        </form>
    </div>
@endsection
