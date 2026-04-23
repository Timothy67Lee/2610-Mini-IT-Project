<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="club_id" value="{{ request('club_id') }}">

    <div class="mb-4">
        <label class="block font-medium">Title</label>
        <input type="text" name="title" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Content</label>
        <textarea name="content" class="w-full border rounded px-3 py-2"></textarea>
    </div>

    <div class="mb-4">
        <label class="block font-medium">Upload Image</label>
        <input type="file" name="image" class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save Post</button>
</form>
