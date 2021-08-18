<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Channel\Channel;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class BanChannel extends ModalComponent
{
    public $channel_id;
    public $comment;
    public $permanent;
    public $expire_at;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Channel::query()->find($this->channel_id);
    }

    public function render()
    {
        return view('livewire.backend.channel.modal.ban-channel');
    }

    public function submit()
    {
        $this->model->ban([
            'comment' => $this->comment,
            'expire_at' => $this->permanent ? null : Carbon::parse($this->expire_at)->format('Y-m-d H:i:s')
        ]);
        $this->emit('channelBanned');
        $this->closeModal();
    }
}
