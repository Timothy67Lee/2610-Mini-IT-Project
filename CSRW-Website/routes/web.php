<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;


Route::get('/log-in.blade.php', function () {
    return view('log-in');
});

Route::get('/', function () {
    return view('navigation');
});




// Homepage → clubs + posts
Route::get('/', [ClubController::class, 'index'])->name('clubs.index');

// Club detail
Route::get('/clubs/{club}', [ClubController::class, 'show'])->name('clubs.show');

// Standalone post routes (for editing/updating/deleting)
Route::resource('posts', PostController::class)->except(['create', 'store']);

// Nested post routes under clubs (for creating/saving)
Route::get('/clubs/{club}/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/clubs/{club}/posts', [PostController::class, 'store'])->name('posts.store');

