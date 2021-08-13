<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Auth\User;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class BanUser extends ModalComponent
{
    public $user_id;
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
        $this->model = User::find($this->user_id);
    }

    public function render()
    {
        return view('livewire.backend.channel.modal.ban-user');
    }

    public function submit()
    {
        $this->model->ban([
           'comment' => $this->comment,
            'expire_at' => $this->permanent ? null : Carbon::parse($this->expire_at)->format('Y-m-d H:i:s')
        ]);
        $this->emit('userBanned');
        $this->closeModal();
    }
}
