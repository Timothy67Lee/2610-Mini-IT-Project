<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $clubs = [
        ["name" => "MMUsic Club", "profile_picture" => "images/1.jpg", "id" => "1"],
        ["name" => "Badminton Club", "profile_picture" => "images/2.jpg", "id" => "2"],
        ["name" => "Cyber Fitness Club", "profile_picture" => "images/3.png", "id" => "3"],
        ["name" => "IT Society", "profile_picture" => "images/4.png", "id" => "4"],
        ["name" => "Google Developer's Club", "profile_picture" => "images/5.png", "id" => "5"],
        ["name" => "MMU Hornbills", "profile_picture" => "images/6.jpg", "id" => "6"],
        ["name" => "Chinese Language Society", "profile_picture" => "images/7.jpg", "id" => "7"],
        ["name" => "Sudanese Cultural Society", "profile_picture" => "images/8.jpg", "id" => "8"],
        ["name" => "UPG Cyber", "profile_picture" => "images/9.jpg", "id" => "9"],
        

    ];
    return view('navigation', ["clubs" => $clubs]);
});

Route::get('/clubs/{name}', function($name){
    return view('clubs.show', ["name" => $name]);
});




