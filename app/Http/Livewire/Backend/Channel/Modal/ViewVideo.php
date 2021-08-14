<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Channel\Video;
use LivewireUI\Modal\ModalComponent;

class ViewVideo extends ModalComponent
{
    public $video_id;
    public $video;

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
        return view('livewire.backend.channel.modal.view-video');
    }
}
