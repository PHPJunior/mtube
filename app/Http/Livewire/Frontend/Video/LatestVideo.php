<?php

namespace App\Http\Livewire\Frontend\Video;

use App\Models\Channel\Video;
use Livewire\Component;
use Livewire\WithPagination;

class LatestVideo extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function render()
    {
        return view('livewire.frontend.video.latest-video', [
            'videos' => Video::where('name', 'like', '%'.$this->search.'%')->where('status', 'ready')->orderBy('created_at', 'desc')->paginate($this->perPage)
        ]);
    }
}
