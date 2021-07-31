<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

use App\Models\Channel\Video;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ViewContent extends ModalComponent
{
    public $video_id;
    public $video;
    public $tab = 'details';

    protected $listeners = [
        'videoUpdated' => '$refresh',
    ];

    public function updateTab($tab)
    {
        $this->tab = $tab;
        $this->emit('updateTab');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->video = Video::find($this->video_id);
    }

    public function render()
    {
        return view('livewire.frontend.channel.modal.view-content');
    }
}
