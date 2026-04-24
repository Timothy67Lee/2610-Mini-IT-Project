<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $clubs = [
        ["name" => "MMUsic Club", "profile_picture" => "images/1.jpg", "id" => "1"],
        ["name" => "Badminton Club", "profile_picture" => "images/2.jpg", "id" => "2"],
        ["name" => "MMUsic Club", "profile_picture" => "images/3.png", "id" => "3"],
        ["name" => "MMUsic Club", "profile_picture" => "images/4.png", "id" => "4"],
    ];
    return view('navigation', ["clubs" => $clubs]);
});

Route::get('/clubs/{name}', function($name){
    return view('clubs.show', ["name" => $name]);
});




