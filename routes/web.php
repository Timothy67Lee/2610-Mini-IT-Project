<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\Club;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage – lists posts (and clubs if you want)
Route::get('/', [PostController::class, 'index'])->name('home');

// Navigation and Public Calendar
Route::get('/navigation', [ClubController::class, 'list'])->name('navigation');
Route::get('/calendar', function () {
    $events = Event::all();
    return view('calendar.index', compact('events'));
})->name('calendar.index');

// Club Details and Listing
Route::get('/clubs', [ClubController::class, 'list'])->name('clubs.index');
Route::get('/clubs/{club}', [ClubController::class, 'show'])->name('clubs.show');

// Follow/Unfollow Clubs
Route::post('/clubs/{club}/follow', [UserController::class, 'followClub'])->name('clubs.follow');
Route::delete('/clubs/{club}/unfollow', [UserController::class, 'unfollowClub'])->name('clubs.unfollow');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard – only followed clubs/events
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Profile Management
    Route::get('/profile', fn() => view('profile.profile'))->name('profile.show');
    Route::get('/profile/edit', fn() => view('profile.edit'))->name('profile.edit');

    Route::patch('/profile', function (\Illuminate\Http\Request $request) {
        $user = Auth::user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'profile_picture'  => 'nullable|image|max:2048',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    })->name('profile.update');

    Route::delete('/profile', function () {
        Auth::user()->delete();
        return redirect('/')->with('success', 'Profile deleted successfully!');
    })->name('profile.destroy');

    // Notifications Feed
    Route::get('/notifications', fn() => auth()->user()->notifications)->name('notifications.index');

    // Committee Club Management (Notifications)
    Route::get('/clubs/{club}/notify', [ClubController::class, 'showNotifyForm'])->name('clubs.notify.form');
    Route::post('/clubs/{club}/notify', [ClubController::class, 'sendUpdate'])->name('clubs.notify.send');

    // Posts Management
    Route::resource('posts', PostController::class)->except(['create', 'store']);
    Route::get('/clubs/{club}/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/clubs/{club}/posts', [PostController::class, 'store'])->name('posts.store');

    // Events Management
    Route::get('/clubs/{club}/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/clubs/{club}/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/clubs/{club}/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/clubs/{club}/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/clubs/{club}/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/clubs/{club}/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

require __DIR__ . '/auth.php';
