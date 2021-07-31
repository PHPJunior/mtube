<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

use App\Models\Channel\Channel;
use Illuminate\Support\Str;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateChannel extends ModalComponent
{
    public $name;
    public $slug;
    public $active;
    public $success;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function updatingName($value)
    {
        $this->slug = Str::slug($value);
        $this->validate([
            'slug' => 'required|unique:channels|max:255',
        ]);
    }

    public function updatedSlug()
    {
        $this->validate([
            'slug' => 'required|unique:channels|max:255',
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.channel.modal.create-channel');
    }

    public function submit()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $channel = Channel::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'active' => $this->active,
        ]);
        $channel->owner()->associate(auth()->user());
        $channel->save();

        $this->success = __('Channel Created.');
        $this->emit('channelCreated');
        $this->closeModal();
    }
}
