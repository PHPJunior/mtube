<?php

namespace App\Http\Livewire\Backend\Admin\Modal;

use App\Models\Auth\Admin;
use LivewireUI\Modal\ModalComponent;

class ViewAdmin extends ModalComponent
{
    public $admin_id;

    public $name;
    public $email;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Admin::find($this->admin_id);
        $this->name = $this->model->name;
        $this->email = $this->model->email;
    }

    public function render()
    {
        return view('livewire.backend.admin.modal.view-admin');
    }
}
