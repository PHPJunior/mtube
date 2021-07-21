<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;
    public $success;

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function save()
    {
        $validated = $this->validate([
            'password' => 'required|string|confirmed|max:255',
            'current_password' => [
                'required', 'string', 'max:255',
                function ($attribute, $value, $fail) {
                    if (! Hash::check($value, auth()->user()->password))
                    {
                        $fail(__('The provided password does not match your current password.'));
                    }
                }
            ]
        ]);

        auth()->user()->forceFill([
            'password' => Hash::make($validated['password']),
        ])->save();

        $this->password = '';
        $this->current_password = '';
        $this->password_confirmation = '';

        $this->success = __('Password updated.');

        $this->emit('profileUpdated');
    }

    public function render()
    {
        return view('livewire.profile.update-password');
    }
}
