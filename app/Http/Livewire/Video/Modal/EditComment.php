<?php

namespace App\Http\Livewire\Video\Modal;

use App\Models\Channel\Comment;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditComment extends ModalComponent
{
    public $comment_id;
    public $comment;
    public $message;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->comment = Comment::find($this->comment_id);
        $this->message = $this->comment->comment;
    }

    public function render()
    {
        return view('livewire.video.modal.edit-comment');
    }

    public function submit()
    {
        $validated = $this->validate([
            'message' => 'required|string'
        ]);
        $this->comment->update([
            'comment' => $validated['message']
        ]);
        $this->emit('commentUpdated');
        $this->closeModal();
    }
}
