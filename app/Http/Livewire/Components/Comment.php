<?php

namespace App\Http\Livewire\Components;

use App\Models\Channel\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;

    public $comment;
    public $video_id;
    public $video;
    public $commenter;
    public $owner = false;

    public $perPage = 5;

    protected $listeners = [
        'commentCreated' => 'getData',
        'commentDeleted' => 'getData',
        'commentUpdated' => 'getData',
        'settingsUpdated' => 'getData'
    ];

    public function mount()
    {
        $this->getData();
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 2;
    }

    public function getData()
    {
        $this->video = Video::find($this->video_id);
    }

    public function submit()
    {
        $validated = $this->validate([
            'comment' => 'required|string'
        ]);

        $comment = new \App\Models\Channel\Comment();
        $comment->commenter()->associate($this->commenter);
        $comment->commentable()->associate($this->video);
        $comment->comment = $validated['comment'];
        $comment->save();

        $this->comment = '';
        $this->emit('commentCreated');
    }

    public function render()
    {
        return view('livewire.components.comment')->with([
            'comments' => $this->video->comments()->parent()->where('hide', false)->orderBy('created_at', 'desc')->paginate($this->perPage)
        ]);
    }
}
