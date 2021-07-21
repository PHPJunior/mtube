<?php

namespace App\Http\Livewire\Channel\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UploadContent extends ModalComponent
{
    public $channel_id;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.channel.modal.upload-content');
    }
}
