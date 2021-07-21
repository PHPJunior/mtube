<?php

namespace App\Http\Livewire\Components;

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

    protected $listeners = [
        'channelSubscribed' => 'getData',
        'channelUnsubscribed' => 'getData',
    ];

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->channel = Channel::find($this->channel_id);
        $this->name = $this->channel->name;
        $this->picture = Storage::disk($this->channel->disk)->url($this->channel->profile_picture);
        $this->count = $this->channel->subscribers()->count();
    }

    public function render()
    {
        return view('livewire.components.channel-profile');
    }
}
