<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Channel\Channel;
use LivewireUI\Modal\ModalComponent;

class UnBanChannel extends ModalComponent
{
    public $channel_id;

    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Channel::find($this->channel_id);
    }

    public function render()
    {
        return view('livewire.backend.channel.modal.un-ban-channel');
    }

    public function submit()
    {
        $this->model->unban();
        $this->emit('channelUnBanned');
        $this->closeModal();
    }
}
