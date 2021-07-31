<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

use App\Models\Channel\Channel;
use LivewireUI\Modal\ModalComponent;

class DeleteChannel extends ModalComponent
{
    public $channel_id;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.frontend.channel.modal.delete-channel');
    }

    public function submit()
    {
        Channel::destroy($this->channel_id);
        $this->emit('channelDeleted');
        $this->closeModal();
    }
}
