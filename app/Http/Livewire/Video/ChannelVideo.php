<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel\Channel;
use Livewire\Component;
use Livewire\WithPagination;

class ChannelVideo extends Component
{
    use WithPagination;

    public $channel_id;
    public $channel;
    public $search = '';
    public $perPage = 20;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function mount()
    {
        $this->channel = Channel::find($this->channel_id);
    }

    public function render()
    {
        return view('livewire.video.channel-video')->with([
            'videos' => $this->channel->videos()->where('name', 'like', '%'.$this->search.'%')->where('status', 'ready')->orderBy('created_at', 'desc')->paginate($this->perPage)
        ]);
    }
}
