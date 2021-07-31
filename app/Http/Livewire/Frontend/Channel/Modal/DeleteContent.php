<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

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
        return view('livewire.frontend.channel.modal.delete-content');
    }

    public function submit()
    {
        Video::destroy($this->video_id);
        $this->emit('videoDeleted');
        $this->closeModal();
    }
}
