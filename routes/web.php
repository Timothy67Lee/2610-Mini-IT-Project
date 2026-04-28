<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
