<?php

namespace App\Http\Livewire\Frontend\Video\Modal;

use App\Events\DynamicChannel;
use App\Models\Channel\Channel;
use App\Models\Channel\Comment;
use App\Models\Channel\Video;
use App\Notifications\SendNotification;
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
        $this->p_comment = Comment::query()->find($this->comment_id);
    }

    public function render()
    {
        return view('livewire.frontend.video.modal.reply-comment');
    }

    public function submit()
    {
        $validated = $this->validate([
            'message' => 'required|string'
        ]);

        $commenter = $this->owner ? Channel::query()->find($this->commenter['id']) : auth()->user();

        $rc = new Comment();
        $rc->parent()->associate($this->p_comment);
        $rc->commenter()->associate($commenter);
        $rc->commentable()->associate($this->p_comment->commentable);
        $rc->comment = $validated['message'];
        $rc->save();

        $model = get_class($this->p_comment->commenter) == Channel::class ? $this->p_comment->commenter->owner : $this->p_comment->commenter;

        if ($model->id != auth()->user()->id)
        {
            $model->notify(new SendNotification([
                'type' => 'reply',
                'on' => $this->p_comment,
                'by' => $commenter,
                'media_id' => $this->p_comment->commentable->media_id
            ]));
        }

        broadcast(new DynamicChannel("{$this->p_comment->commentable->media_id}.video.comments"));

        $this->message = '';
        $this->emit('commentCreated');
        $this->closeModal();
    }
}
