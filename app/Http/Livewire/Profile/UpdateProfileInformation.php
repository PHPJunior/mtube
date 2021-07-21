<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformation extends Component
{
    use WithFileUploads;

    public $name;
    public $success;

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function mount()
    {
        $this->name = auth()->user()->name;
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        auth()->user()->update($validated);
        $this->success = __('Profile Updated');
        $this->emit('profileUpdated');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information');
    }
}
