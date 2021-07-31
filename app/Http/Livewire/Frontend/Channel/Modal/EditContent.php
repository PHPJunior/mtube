<?php

namespace App\Http\Livewire\Frontend\Channel\Modal;

use App\Models\Channel\Video;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditContent extends ModalComponent
{
    public $video_id;
    public $name;
    public $description;
    public $success;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Video::find($this->video_id);
        $this->name = $this->model->name;
        $this->description = $this->model->description;
    }

    public function render()
    {
        return view('livewire.frontend.channel.modal.edit-content');
    }

    public function submit()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->model->update([
            'name' => $validated['name'],
            'description' => $this->description,
        ]);

        $this->success = __('Content Updated.');
        $this->emit('videoUpdated');
        $this->closeModal();
    }
}
