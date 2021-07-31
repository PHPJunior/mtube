<?php

namespace App\Http\Livewire\Frontend\Components;

use Illuminate\Notifications\Events\BroadcastNotificationCreated;
use Livewire\Component;
use Livewire\WithPagination;

class Notification extends Component
{
    use WithPagination;

    public $perPage = 5;

    public function getListeners()
    {
        $id = auth()->user()->id;
        return [
            "echo-private:user.notifications.{$id},UserNotifications" => '$refresh',
            'markAllAsRead' => '$refresh',
        ];
    }

    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }

    public function render()
    {
        return view('livewire.frontend.components.notification')->with([
            'notifications' => paginate(auth()->user()->unreadNotifications, $this->perPage)
        ]);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->emit('markAllAsRead');
    }
}
