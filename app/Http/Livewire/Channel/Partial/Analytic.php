<?php

namespace App\Http\Livewire\Channel\Partial;

use App\Models\Channel\Video;
use Livewire\Component;

class Analytic extends Component
{
    public $video_id;
    public $video;
    public $total_views;
    public $subscribed_user_views;
    public $unsubscribed_user_views;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->video = Video::find($this->video_id);
        $this->subscribed_user_views = views($this->video)->unique()->collection('subscribed')->count();
        $this->unsubscribed_user_views = views($this->video)->unique()->collection('unsubscribed')->count();
        $this->total_views = $this->subscribed_user_views + $this->unsubscribed_user_views;
    }

    public function render()
    {
        return view('livewire.channel.partial.analytic');
    }
}
