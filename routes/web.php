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

//Ruta publica
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

//Ruta protegida
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});