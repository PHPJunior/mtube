<?php

namespace App\Http\Livewire\Video\Modal;

use App\Models\Channel\Comment;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteComment extends ModalComponent
{
    public $comment_id;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.video.modal.delete-comment');
    }

    public function submit()
    {
        Comment::destroy($this->comment_id);
        $this->emit('commentDeleted');
        $this->closeModal();
    }
}
