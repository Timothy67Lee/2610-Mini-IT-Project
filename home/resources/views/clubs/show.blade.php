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
        <a href="{{ route('events.create', ['club' => $club->id]) }}" class="btn btn-green">Add Event</a>
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

<h2 class="posts-title text-center">Events</h2>

@if($club->events->count())
    <div class="events-table-wrapper">
        <table class="events-table">
            <thead>
                <tr>
                    <th>Event Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($club->events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->time }}</td>
                      <td>
    <a href="{{ route('events.edit', ['club' => $club->id, 'event' => $event->id]) }}" 
       class="btn btn-green">Edit</a>

    <form action="{{ route('events.destroy', ['club' => $club->id, 'event' => $event->id]) }}" 
          method="POST" style="display:inline;" 
          onsubmit="return confirm('Are you sure you want to delete this event?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-red">Delete</button>
    </form>
</td>

    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-center">No events yet for this club.</p>
@endif

@endsection

