@extends('layouts.app')

@section('content')

  <header class="page-header">
        <h1>EDIT YOUR CURRENT POST</h1>
    </header>

    <div class="form-container edit-form">
        <h1 class="form-title">💾 Edit Post</h1>
        <p class="form-subtitle">Update your post details and save changes.</p>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="styled-form">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Post Title *</label>
                <input type="text" id="title" name="title" 
                       value="{{ old('title', $post->title) }}" 
                       placeholder="Update your title">
            </div>

            <!-- Content -->
            <div class="form-group">
                <label for="content">Content *</label>
                <textarea id="content" name="content" rows="5" 
                          placeholder="Update your content">{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload New Image</label>
                <input type="file" id="image" name="image">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="post-image mt-2">
                @endif
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-update">💾 Update Post</button>
        </form>
    </div>
@endsection
