<?php

namespace App\Http\Livewire\Backend\Admin\Modal;

use App\Models\Auth\Admin;
use LivewireUI\Modal\ModalComponent;

class DeleteAdmin extends ModalComponent
{
    public $admin_id;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.backend.admin.modal.delete-admin');
    }

    public function submit()
    {
        Admin::destroy($this->admin_id);
        $this->emit('adminDeleted');
        $this->closeModal();
    }
}
