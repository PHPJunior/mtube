<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

use App\Models\Channel\Channel;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class EditChannel extends ModalComponent
{
    public $channel_id;

    public $name;
    public $slug;
    public $active;
    public $success;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Channel::query()->find($this->channel_id);
        $this->name = $this->model->name;
        $this->slug = $this->model->slug;
        $this->active = $this->model->active;
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

    public function submit()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->model->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'active' => $this->active,
        ]);

        $this->success = __('Channel Updated.');
        $this->emit('channelUpdated');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.frontend.channel.modal.edit-channel');
    }
}
