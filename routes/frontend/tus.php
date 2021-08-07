<?php

use Illuminate\Support\Facades\Route;

Route::any('/tus/{any?}', function () {
    return app('tus-server')->serve();
})->where('any', '.*');
