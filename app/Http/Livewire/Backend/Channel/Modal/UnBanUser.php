<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Auth\User;
use LivewireUI\Modal\ModalComponent;

class UnBanUser extends ModalComponent
{
    public $user_id;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = User::find($this->user_id);
    }

    public function submit()
    {
        $this->model->unban();
        $this->emit('userUnBanned');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.channel.modal.un-ban-user');
    }
}
