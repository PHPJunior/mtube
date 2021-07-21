<?php


use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/dashboard', function () {
        return view('site.user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/profile', function () {
        return view('site.user.profile.index');
    })->name('user.profile');

    Route::get('/user/channels', function () {
        return view('site.user.channel.index');
    })->name('user.channels');

    Route::get('/user/channels/{id}', function ($id) {
        return view('site.user.channel.show')->with([
            'channel' => auth()->user()->channels()->find($id)
        ]);
    })->name('user.channels.show');
});
