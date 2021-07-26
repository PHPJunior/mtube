<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/watch', [PageController::class, 'watch'])->name('watch');
Route::get('/download', [PageController::class, 'download'])->name('download');
Route::get('/channel/{slug}', [PageController::class, 'channel'])->name('channel');

includeRouteFiles(__DIR__.'/site');
