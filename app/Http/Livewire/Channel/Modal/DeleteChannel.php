<?php

namespace App\Http\Livewire\Channel\Modal;

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
        return view('livewire.channel.modal.delete-channel');
    }

    public function submit()
    {
        Channel::destroy($this->channel_id);
        $this->emit('channelDeleted');
        $this->closeModal();
    }
}
