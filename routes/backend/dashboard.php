<?php


use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
