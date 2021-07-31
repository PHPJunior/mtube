<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function () {
    Route::get('/users', function () {
        return view('backend.channel.user');
    })->name('user');
    Route::get('/channels', function () {
        return view('backend.channel.channel');
    })->name('channel');
    Route::get('/videos', function () {
        return view('backend.channel.video');
    })->name('video');
});
