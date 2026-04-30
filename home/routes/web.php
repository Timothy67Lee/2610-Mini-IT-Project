<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Models\Event;


Route::get('/navigation', function () {
    return view('navigation'); // loads navigation.blade.php
})->name('navigation');



// Homepage → list clubs + posts
Route::get('/', [ClubController::class, 'index'])->name('home');

// Club detail
Route::get('/clubs/{club}', [ClubController::class, 'show'])->name('clubs.show');

// Clubs list page (optional separate route)
Route::get('/clubs', [ClubController::class, 'list'])->name('clubs.index');

// Standalone post routes (edit/update/delete only)
Route::resource('posts', PostController::class)->except(['create', 'store']);

// Nested post routes under clubs (create + store)
Route::get('/clubs/{club}/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/clubs/{club}/posts', [PostController::class, 'store'])->name('posts.store');

// Calendar page

Route::get('/calendar', function () {
    $events = Event::all();
    return view('calendar.index', compact('events'));
})->name('calendar.index');

// Event routes nested under clubs
Route::get('/clubs/{club}/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/clubs/{club}/events', [EventController::class, 'store'])->name('events.store');

Route::get('/clubs/{club}/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/clubs/{club}/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/clubs/{club}/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
