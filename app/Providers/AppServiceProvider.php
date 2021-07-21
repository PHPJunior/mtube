<?php

namespace App\Providers;

use App\Models\Channel\Video;
use App\Observers\VideoObserver;
use App\Services\GoogleDriveAdapter;
use TusPhp\Tus\Server as TusServer;
use App\Listeners\TusEventListener;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tus-server', function ($app) {
            Storage::disk('public')->makeDirectory('uploads');

            $server = new TusServer('redis');
            $server->setApiPath('/tus')->setUploadDir(storage_path('app/public/uploads'));

            $listener = app(TusEventListener::class);
            $server->event()->addListener('tus-server.upload.complete', [
                $listener, 'handleUploadCompleted'
            ]);

            return $server;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Video::observe(VideoObserver::class);
    }
}
