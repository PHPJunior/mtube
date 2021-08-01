<?php

namespace App\Http\Livewire\Frontend\Video;

use App\Models\Channel\Video;
use Livewire\Component;
use Livewire\WithPagination;

class WatchVideo extends Component
{
    use WithPagination;

    public $video;
    public $next_video;
    public $show = false;
    public $autoplay = 1;
    public $view = 0;
    public $perPage = 10;

    public function toggleShowHide()
    {
        $this->show = !$this->show;
        $this->emit('showHideDescription');
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
        $this->emit('loadMore');
    }

    public function updatedAutoplay($value)
    {
        $this->emit('showHideDescription');
    }

    public function render()
    {
        $upcoming_videos = Video::withoutBanned()->where('id', '!=', $this->video->id)->where('status', 'ready')->inRandomOrder()->paginate($this->perPage);
        $this->next_video = $upcoming_videos->first();
        $this->autoplay = request()->get('autoplay', null) ? 1 : null ;
        $this->view = views($this->video)->unique()->count();

        return view('livewire.frontend.video.watch-video')->with([
            'upcoming_videos' => $upcoming_videos
        ]);
    }
}
