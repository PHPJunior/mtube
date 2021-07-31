<?php

namespace App\Http\Livewire\Backend\Channel\Modal;

use App\Models\Channel\Video;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class BanVideo extends ModalComponent
{
    public $video_id;
    public $comment;
    public $permanent;
    public $expire_at;
    public $model;

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->model = Video::find($this->video_id);
    }

    public function render()
    {
        return view('livewire.backend.channel.modal.ban-video');
    }

    public function submit()
    {
        $this->model->ban([
            'comment' => $this->comment,
            'expire_at' => $this->permanent ? null : Carbon::parse($this->expire_at)->format('Y-m-d H:i:s')
        ]);
        $this->emit('videoBanned');
        $this->closeModal();
    }
}
