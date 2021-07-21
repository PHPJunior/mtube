<?php

namespace App\Http\Livewire\Video\Modal;

use App\Models\Channel\Channel;
use App\Models\Channel\Comment;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ReplyComment extends ModalComponent
{
    public $comment_id;
    public $commenter;
    public $owner;
    public $message;
    public $p_comment;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->p_comment = Comment::find($this->comment_id);
    }

    public function render()
    {
        return view('livewire.video.modal.reply-comment');
    }

    public function submit()
    {
        $validated = $this->validate([
            'message' => 'required|string'
        ]);

        $commenter = $this->owner ? Channel::find($this->commenter['id']) : auth()->user();

        $rc = new Comment();
        $rc->parent()->associate($this->p_comment);
        $rc->commenter()->associate($commenter);
        $rc->commentable()->associate($this->p_comment->commentable);
        $rc->comment = $validated['message'];
        $rc->save();

        $this->message = '';
        $this->emit('commentCreated');
        $this->closeModal();
    }
}
