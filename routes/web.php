<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Models\Event;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/navigation', function () {
    return view('navigation');
});

Route::get('/clubs/{name}', function($name){
    return view('clubs.show', ["name" => $name]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route to show the notification form (Get form from committee end)
    Route::get('/clubs/{id}/notify', [ClubController::class, 'showNotifyForm'])->name('clubs.notify.form');
    // Route to actually send the notification (Post)
    Route::post('/clubs/{id}/notify', [ClubController::class, 'sendUpdate'])->name('clubs.notify.send');
    // Route to view notifications (for the notification bell)
    Route::get('/notifications', function () {
    return auth()->user()->notifications; // Or return a view
        })->name('notifications.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

require __DIR__.'/auth.php';



Route::get('/navigation', function () {
    return view('navigation'); // loads navigation.blade.php
})->name('navigation');



// Rowen routes 
// Homepage → list clubs + posts
Route::get('/navigation', [ClubController::class, 'index'])->name('home');

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

// Creating Clubs routes
Route::resource('clubs', 'ClubController');

















