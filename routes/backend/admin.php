<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->get('/admins', function () {
    return view('backend.admin.index');
})->name('admin');
