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
    
    <h3 class="post-title">{{ $post->title }}</h3>

    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="post-image">
    @endif

    <p class="post-content">{{ $post->content }}</p>

    <small class="post-meta">Posted in: {{ $post->club->name }}</small>
</div>

    @empty
        <p>No posts yet.</p>
    @endforelse

    <!-- Scroll-to-top button -->
<button id="scrollTopBtn">LATEST POST</button>



@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const scrollBtn = document.getElementById("scrollTopBtn");

    
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {  
            scrollBtn.classList.remove("hidden");
        } else {
            scrollBtn.classList.add("hidden");
        }
    });

    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
</script>
@endpush


