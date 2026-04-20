@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Content</label>
            <textarea name="content" class="w-full border rounded px-3 py-2">{{ $post->content }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Image</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="mt-2 w-40">
            @endif
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update Post</button>
    </form>
</div>
@endsection
