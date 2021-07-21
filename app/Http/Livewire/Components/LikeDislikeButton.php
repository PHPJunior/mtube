<?php

namespace App\Http\Livewire\Components;

use App\Models\Channel\Video;
use Livewire\Component;

class LikeDislikeButton extends Component
{
    public $video_id;
    public $video;

    protected $listeners = [
        'videoLiked' => 'getData',
        'videoDisliked' => 'getData',
    ];

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
        }
        $this->emit('videoLiked');
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
    }

    public function render()
    {
        return view('livewire.components.like-dislike-button');
    }
}
