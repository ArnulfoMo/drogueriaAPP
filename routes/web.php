<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function() {
    return view('layout.admin');
});

Route::get('login', function() {
    return view('auth.login');
});