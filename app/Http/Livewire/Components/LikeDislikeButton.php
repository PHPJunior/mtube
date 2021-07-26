<?php

namespace App\Http\Livewire\Components;

use App\Events\DynamicChannel;
use App\Models\Channel\Video;
use App\Notifications\SendNotification;
use Livewire\Component;

class LikeDislikeButton extends Component
{
    public $video_id;
    public $video;

    protected function getListeners()
    {
        return [
            'videoLiked' => 'getData',
            'videoDisliked' => 'getData',
            "echo:{$this->video->media_id}.video.liked,DynamicChannel" => 'getData'
        ];
    }

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->video = Video::find($this->video_id);
    }

    public function likeVideo()
    {
        if(auth()->user()->hasUpVoted($this->video))
        {
            auth()->user()->cancelVote($this->video);
        }else{
            auth()->user()->upVote($this->video);
            if ($this->video->channel->owner->id != auth()->user()->id)
            {
                $this->video->channel->owner->notify(new SendNotification([
                    'type' => 'liked',
                    'on' => $this->video,
                    'by' => auth()->user(),
                ]));
            }
        }
        $this->emit('videoLiked');
        broadcast(new DynamicChannel("{$this->video->media_id}.video.liked"));
    }

    public function dislikeVideo()
    {
        if(auth()->user()->hasDownVoted($this->video))
        {
            auth()->user()->cancelVote($this->video);
        }else{
            auth()->user()->downVote($this->video);
        }
        $this->emit('videoDisliked');
        broadcast(new DynamicChannel("{$this->video->media_id}.video.liked"));
    }

    public function render()
    {
        return view('livewire.components.like-dislike-button');
    }
}
