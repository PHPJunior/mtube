<?php

namespace App\Http\Livewire\Channel\Partial;

use App\Models\Channel\Video;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class Thumbnail extends Component
{
    use WithFileUploads;

    public $video_id;
    public $video;
    public $thumbnails = [];
    public $photo;
    public $success;

    public function mount()
    {
        $this->video = Video::find($this->video_id);
//        $this->getThumbnailsList();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function saveThumbnail()
    {
        $this->photo->storeAs('converted/' . $this->video->media_id, $this->video->id . '.png', $this->video->disk);
        $this->success = __('Thumbnail Updated.');
        $this->emit('videoUpdated');
    }

    public function saveThumbnailFromVideo($seconds)
    {
        $thumbnail = 'converted/' . $this->video->media_id . '/'. $this->video->id . '.png';
        FFMpeg::fromDisk($this->video->disk)->open($this->video->path)
            ->getFrameFromSeconds($seconds)
            ->export()
            ->toDisk($this->video->disk)
            ->save($thumbnail);
        $this->success = __('Thumbnail Updated.');
        $this->emit('videoUpdated');
    }

    public function render()
    {
        return view('livewire.channel.partial.thumbnail');
    }

    private function getThumbnailsList()
    {
        $this->thumbnails = [];
        foreach ([1, 5, 15, 25, 30] as $key => $seconds) {
            $img = Image::cache(function($image) use ($seconds) {
                $image->make(getFrameFromSeconds($this->video->path, $seconds));
                $image->encode('png');
            });
            $type = 'png';
            $this->thumbnails[] = [
                'seconds' => $seconds,
                'img' => 'data:image/' . $type . ';base64,' . base64_encode($img)
            ];
        }
    }
}
