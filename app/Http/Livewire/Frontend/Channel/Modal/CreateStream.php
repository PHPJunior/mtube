<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

use App\Models\Channel\Channel;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreateStream extends ModalComponent
{
    use WithFileUploads;

    public $channel_id;
    public $name;
    public $description;
    public $photo;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.frontend.channel.modal.create-stream');
    }

    public function submit()
    {
        $stream_key = Str::random(20);
        $filesystem = config('site.converted_file_driver');
        $streaming_url = "/live/{$stream_key}/index.m3u8";
        $media_id = Str::random(10);

        $channel = Channel::query()->find($this->channel_id);
        $video = $channel->videos()->create([
            'name' => $this->name,
            'description' => $this->description,
            'disk' => $filesystem,
            'media_id' => $media_id,
            'status' => 'ready',
            'streaming_url' => $streaming_url,
            'type' => 'live',
            'extra_attributes' => [
                'stream_key' => $stream_key,
                'go_live' => false
            ]
        ]);

        if ($this->photo)
        {
            $this->photo->storeAs('converted/' . $video->media_id, $video->id . '.png', $video->disk);
            $video->thumbnail_url = "converted/{$video->media_id}/{$video->id}.png";
            $video->save();
        }

        $this->redirectRoute('user.channels.live', ['channel_id' => $video->channel_id, 'video_id' => $video->id]);
    }
}
