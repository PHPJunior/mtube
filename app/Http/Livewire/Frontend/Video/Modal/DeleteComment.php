<?php

namespace App\Http\Livewire\Frontend\Video\Modal;

use App\Events\DynamicChannel;
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
        return view('livewire.frontend.video.modal.delete-comment');
    }

    public function submit()
    {
        $comment = Comment::query()->find($this->comment_id);
        $comment->delete();

        broadcast(new DynamicChannel("{$comment->commentable->media_id}.video.comments"));

        $this->emit('commentDeleted');

        $this->closeModal();
    }
}
