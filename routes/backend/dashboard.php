<?php


use App\Http\Livewire\Backend\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->get('/dashboard', Dashboard::class)->name('dashboard');
