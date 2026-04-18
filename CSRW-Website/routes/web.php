<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/log-in.blade.php', function () {
    return view('log-in');
});

Route::get('/', function () {
    return view('navigation');
});

