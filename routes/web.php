<?php

use App\Models\Channel\Channel;
use App\Models\Channel\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/test', function (Request $request) {
    $downloader = new \App\Services\Downloader();
    $downloader->setSpeed(100);
    $downloader->download();
})->name('download');

Route::view('/', 'site.page.home')->name('home');
Route::get('/watch', function (Request $request) {
    $video = Video::where('media_id', $request->get('v'))->first();
    if (auth()->check())
    {
        auth()->user()->hasSubscribed($video->channel);
        views($video)->collection(auth()->user()->hasSubscribed($video->channel) ? 'subscribed': 'unsubscribed')->record();
    }else{
        views($video)->collection('unsubscribed')->record();
    }
    return view('site.page.watch')->with([
        'video' => $video
    ]);
})->name('watch');

Route::get('/download', function (Request $request) {
    $video = Video::where('media_id', $request->get('v'))->first();
    if ($video->settings()->get('allow_download', false))
    {
        $headers = [
            'Content-Length: '. $video->file_size
        ];
        return Storage::disk($video->disk)->download($video->path, basename($video->path), $headers);
    }else{
        return response()->json(['message' => 'You dont have permission to download this video'], 403);
    }
})->name('download');

Route::get('/channel/{slug}', function ($slug) {
    return view('site.page.channel')->with([
        'channel' => Channel::where('slug', $slug)->first()
    ]);
})->name('channel');

includeRouteFiles(__DIR__.'/site');
