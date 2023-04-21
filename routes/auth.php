<?php

use Illuminate\Support\Facades\Route;

// Middleware Guest
Route::middleware('guest')->group(function () {
    Route::get('login', 'App\Http\Controllers\Auth\AuthenticatedSessionController@create')->name('login');
    Route::post('login', 'App\Http\Controllers\Auth\AuthenticatedSessionController@store');
});

// Middleware Auth
Route::middleware('auth')->group(function () {
    Route::post('logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');
});
