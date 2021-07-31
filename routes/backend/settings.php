<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->get('/settings', function () {
    return view('backend.settings');
})->name('settings');
