<?php

use App\Http\Livewire\Backend\Auth\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->get('login', Login::class)->name('login');
Route::middleware('auth:admin')->post('logout', function () {
    Auth::guard('admin')->logout();
    return redirect(route('home'));
})->name('logout');
