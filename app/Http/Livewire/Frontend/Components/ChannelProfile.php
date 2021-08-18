<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Models\Channel\Channel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ChannelProfile extends Component
{
    public $channel_id;
    public $channel;
    public $name;
    public $picture;
    public $count;

    public function getListeners()
    {
        return [
            'channelSubscribed' => 'getData',
            'channelUnsubscribed' => 'getData',
            "echo:{$this->channel->slug}.channel.subscribed,DynamicChannel" => 'getData'
        ];
    }

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->channel = Channel::query()->find($this->channel_id);
        $this->name = $this->channel->name;
        $this->picture = Storage::disk($this->channel->disk)->url($this->channel->profile_picture);
        $this->count = $this->channel->subscribers()->count();
    }

    public function render()
    {
        return view('livewire.frontend.components.channel-profile');
    }
}
