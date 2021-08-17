<?php

namespace App\Listeners;

use App\Models\Channel\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TusEventListener
{
    /**
     * Handle upload completed events.
     */
    public function handleUploadCompleted($event)
    {
        try {
            $file = $event->getFile()->details();

            $path = last(explode('/storage/app/public/', $file['file_path']));
            $tus = last(explode('/tus/', $file['location']));

            $duration = Str::contains($file['metadata']['type'],['video/x-matroska']) ? 0 : getVideoDurationInSeconds($path);
            $filesystem = config('site.converted_file_driver');

            $channel = Channel::query()->find($file['metadata']['channel']);
            $channel->videos()->create([
                'name' => 'untitled video',
                'media_id' => Str::random(10),
                'path' => $path,
                'file_size' => $file['size'],
                'file_type' => $file['metadata']['type'],
                'duration' => $duration,
                'status' => 'notready',
                'disk' => $filesystem,
                'tus_id' => $tus,
                'type' => 'upload',
            ]);
        }catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
