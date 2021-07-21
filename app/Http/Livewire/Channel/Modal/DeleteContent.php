<?php

namespace App\Http\Livewire\Channel\Modal;

use App\Models\Channel\Video;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteContent extends ModalComponent
{
    public $video_id;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.channel.modal.delete-content');
    }

    public function submit()
    {
        Video::destroy($this->video_id);
        $this->emit('videoDeleted');
        $this->closeModal();
    }
}
