<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Clubs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header>
        <h2>Explore Our Clubs</h2>
    </header>

    <!-- Club cards section -->
    <div class="club-grid">
        @foreach($clubs as $club)
            <div class="club-card">
                <!-- Card clickable link -->
                <a href="{{ route('clubs.show', $club->id) }}" class="club-link">
                    <img src="{{ asset('images/' . $club->profile_picture) }}" alt="{{ $club->name }}">
                    <h3>{{ $club->name }}</h3>
                    <p>{{ $club->description }}</p>
                </a>
            </div>
        @endforeach
    </div>
            
    <!-- Homepage Feed Section -->
    <section class="post-feed">
        <h2>Latest Posts</h2>
        @foreach($posts as $post)
            <article class="post-card max-w-xs mx-auto mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Club name on top -->
                <div class="p-2 border-b text-center">
                    <h3 class="font-bold text-center">{{ $post->club->name }}</h3>
                </div>

                <!-- Image in the middle -->
                @if($post->image)
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' .$post->image) }}" 
                             alt="{{ $post->title }}" 
                             class="post-image my-4">
                    </div>
                @endif

                <!-- Title + description below -->
                <div class="p-4 text-center">
                    <h4 class="text-md font-semibold mb-2">{{ $post->title }}</h4>
                    <p class="text-gray-600">{{ $post->content }}</p>
                </div>
            </article>
        @endforeach
    </section>

    <footer>
        <p>2026 UNIVERSITY CLUBS</p>
    </footer>
    
</body>
</html>
