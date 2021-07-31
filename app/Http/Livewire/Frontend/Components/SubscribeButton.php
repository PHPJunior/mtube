<?php

namespace App\Http\Livewire\Frontend\Components;

use App\Events\DynamicChannel;
use App\Events\LiveCount;
use App\Models\Channel\Channel;
use App\Notifications\SendNotification;
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
        return view('livewire.frontend.components.subscribe-button');
    }

    public function subscribeChannel()
    {
        auth()->user()->subscribe($this->channel);
        $this->emit('channelSubscribed');
        broadcast(new LiveCount($this->channel->slug));
        broadcast(new DynamicChannel("{$this->channel->slug}.channel.subscribed"));
        if ($this->channel->owner->id != auth()->user()->id)
        {
            $this->channel->owner->notify(new SendNotification([
                'type' => 'subscribed',
                'on' => $this->channel,
                'by' => auth()->user(),
            ]));
        }
    }

    public function unsubscribeChannel()
    {
        auth()->user()->unsubscribe($this->channel);
        $this->emit('channelUnsubscribed');
        broadcast(new LiveCount($this->channel->slug));
        broadcast(new DynamicChannel("{$this->channel->slug}.channel.subscribed"));
    }
}
