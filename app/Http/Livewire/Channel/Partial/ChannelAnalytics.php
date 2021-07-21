<?php

namespace App\Http\Livewire\Channel\Partial;

use App\Models\Channel\Channel;
use Livewire\Component;

class ChannelAnalytics extends Component
{
    public $channel_id;
    public $count;
    public $channel;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->channel = Channel::find($this->channel_id);
        $this->count = $this->channel->subscribers()->count();
    }

    public function getListeners()
    {
        return [
            "echo-private:live.count.{$this->channel->slug},LiveCount" => 'getData'
        ];
    }

    public function render()
    {
        return view('livewire.channel.partial.channel-analytics');
    }
}
