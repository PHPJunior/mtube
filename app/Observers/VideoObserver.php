<?php

namespace App\Observers;

use App\Jobs\StartConvert;
use App\Models\Channel\Video;
use Illuminate\Support\Facades\Storage;

class VideoObserver
{
    /**
     * @param Video $video
     */
    public function created(Video $video)
    {
        dispatch(new StartConvert($video->id));
    }

    /**
     * @param Video $video
     */
    public function deleted(Video $video)
    {
        Storage::disk('public')->delete($video->path);
        Storage::disk($video->disk)->deleteDirectory('converted/' . $video->media_id);
    }
}
