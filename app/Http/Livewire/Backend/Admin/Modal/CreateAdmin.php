<?php

namespace App\Http\Livewire\Backend\Admin\Modal;

use App\Models\Auth\Admin;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class CreateAdmin extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $success;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.backend.admin.modal.create-admin');
    }

    public function updatedEmail()
    {
        $this->validate([
            'email' => ['email', 'unique:admins'],
        ]);
    }

    public function updatedPasswordConfirmation()
    {
        $this->validate([
            'password' => ['min:8', 'same:passwordConfirmation'],
        ]);
    }

    public function submit()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:admins'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        Admin::create([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->success = 'Admin Created';
        $this->emit('adminCreated');
    }
}
