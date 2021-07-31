<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function () {
    Route::get('/users', function () {
        return view('backend.channel.user');
    })->name('user');
});
