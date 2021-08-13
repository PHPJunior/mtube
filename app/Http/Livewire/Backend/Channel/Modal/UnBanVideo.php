<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Channel\Video;
use LivewireUI\Modal\ModalComponent;

class UnBanVideo extends ModalComponent
{
    public $video_id;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Video::find($this->video_id);
    }

    public function submit()
    {
        $this->model->unban();
        $this->emit('videoUnBanned');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.channel.modal.un-ban-video');
    }
}
