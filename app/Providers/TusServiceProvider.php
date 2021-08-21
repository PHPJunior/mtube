<?php

namespace App\Providers;

use App\Listeners\TusEventListener;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use TusPhp\Tus\Server as TusServer;

class TusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('tus-server', function () {
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
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
