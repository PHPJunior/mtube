<?php

namespace App\Console\Commands;

use App\Events\VideoProgress;
use App\Models\Channel\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertVideoForStreaming extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:hls {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert Video For Streaming';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $video = Video::find($this->argument('id'));
        $video->update([
            'status' => 'notready'
        ]);

        $this->info("Converting {$video->name}");

        $name = 'converted/' . $video->media_id . '/'. $video->id . '.m3u8';
        $thumbnail = 'converted/' . $video->media_id . '/'. $video->id . '.png';

        try {
            $lowBitrate = (new X264)->setKiloBitrate(250);
            $midBitrate = (new X264)->setKiloBitrate(500);
            $highBitrate = (new X264)->setKiloBitrate(1000);
            $superBitrate = (new X264)->setKiloBitrate(1500);

            $ffmpeg = FFMpeg::fromDisk('public')->open($video->path);
            $ffmpeg->exportForHLS()
                ->setSegmentLength(config('site.hls_segment_size'))
                ->addFormat($lowBitrate)
                ->addFormat($midBitrate)
                ->addFormat($highBitrate)
                ->addFormat($superBitrate)
                ->onProgress(function ($progress) use ($video) {
                    $video->update([
                        'progress' => $progress
                    ]);
                    $this->info("Progress : {$progress}%");
                    broadcast(new VideoProgress($video->channel->id));
                })
                ->toDisk($video->disk)
                ->save($name)
                ->getFrameFromSeconds(config('site.frame_from_seconds'))
                ->export()
                ->toDisk($video->disk)
                ->save($thumbnail);

            $video->update([
                'thumbnail_url' => $thumbnail,
                'streaming_url' => $name,
                'progress' => 100,
                'status' => 'ready'
            ]);
            broadcast(new VideoProgress($video->channel->id));
            $this->info('Done!!');
        }catch (\Exception $e) {
            Log::error($e->getMessage());
            $video->update([
                'status' => 'failed'
            ]);
        }
    }
}
