<?php

namespace App\Http\Livewire\Frontend\Channel;

use Livewire\Component;

class LiveProducer extends Component
{
    public $channel_id;
    public $video_id;
    public $video;
    public $name;
    public $description;
    public $start;
    public $server_url;
    public $stream_key;

    public function mount()
    {
        $this->video = auth()->user()->channels()->find($this->channel_id)->videos()->find($this->video_id);
        $this->name = $this->video->name;
        $this->description = $this->video->description;
        $this->start = $this->video->extra_attributes->get('go_live');
        $this->stream_key = $this->video->extra_attributes->get('stream_key');
        $this->server_url = config("RTMP.SERVER_URL");
    }

    public function startLive($value)
    {
        $this->video->extra_attributes->set('go_live', $value);
        $this->start = $value;

        $this->video->name = $this->name;
        $this->video->description = $this->description;
        $this->video->save();

        $this->emit('startLive');
    }

    public function render()
    {
        return view('livewire.frontend.channel.live-producer');
    }
}
