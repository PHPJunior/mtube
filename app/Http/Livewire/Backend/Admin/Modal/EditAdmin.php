<?php

namespace App\Http\Livewire\Backend\Admin\Modal;

use App\Models\Auth\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class EditAdmin extends ModalComponent
{
    public $admin_id;

    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $success;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Admin::query()->find($this->admin_id);
        $this->name = $this->model->name;
        $this->email = $this->model->email;
    }

    public function updatedEmail()
    {
        $this->validate([
            'email' => ['email', Rule::unique('admins')->ignore($this->model->id)],
        ]);
    }

    public function updatedPasswordConfirmation()
    {
        $this->validate([
            'password' => ['min:8', 'same:passwordConfirmation'],
        ]);
    }

    public function render()
    {
        return view('livewire.backend.admin.modal.edit-admin');
    }

    public function submit()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('admins')->ignore($this->model->id)],
        ]);

        $this->model->update([
            'email' => $validated['email'],
            'name' => $validated['name'],
        ]);

        if ($this->password)
        {
            $this->model->update([
                'password' => Hash::make($this->password),
            ]);
        }

        $this->success = __('Admin Updated.');
        $this->emit('adminUpdated');
        $this->closeModal();
    }
}
