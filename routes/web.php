<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;

// Homepage → clubs + posts
Route::get('/', [ClubController::class, 'index'])->name('clubs.index');

// Club detail
Route::get('/clubs/{club}', [ClubController::class, 'show'])->name('clubs.show');

// Standalone post routes (for editing/updating/deleting)
Route::resource('posts', PostController::class)->except(['create', 'store']);

// Nested post routes under clubs (for creating/saving)
Route::get('/clubs/{club}/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/clubs/{club}/posts', [PostController::class, 'store'])->name('posts.store');


Route::get('/', [ClubController::class, 'index'])->name('home');
Route::get('/clubs', [ClubController::class, 'list'])->name('clubs.index');
Route::get('/calendar', function () {
    return view('calendar.index');
})->name('calendar.index');
