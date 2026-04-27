<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;

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
    return view('calendar.index');
})->name('calendar.index');
