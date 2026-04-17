<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('log-in');
});

Route::get('/log-in.blade.php', function () {
    return view('log-in');
});

