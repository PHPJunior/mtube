<?php

namespace App\Http\Livewire\Components;

use App\Models\Channel\Channel;
use Livewire\Component;

class SubscribeButton extends Component
{
    protected $listeners = [
        'channelSubscribed' => 'getData',
        'channelUnsubscribed' => 'getData',
    ];

    public $channel_id;
    public $channel;
    public $subscribe;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->channel = Channel::find($this->channel_id);
        $this->subscribe = auth()->check() ? auth()->user()->hasSubscribed($this->channel) : false;
    }

    public function render()
    {
        return view('livewire.components.subscribe-button');
    }

    public function subscribeChannel()
    {
        auth()->user()->subscribe($this->channel);
        $this->emit('channelSubscribed');
    }

    public function unsubscribeChannel()
    {
        auth()->user()->unsubscribe($this->channel);
        $this->emit('channelUnsubscribed');
    }
}
