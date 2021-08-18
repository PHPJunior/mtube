<?php

namespace App\Http\Livewire\Frontend\Channel\Partial;

use App\Models\Channel\Video;
use Livewire\Component;

class Settings extends Component
{
    public $video_id;
    public $video;
    public $settings;

    public function mount()
    {
        $this->video = Video::query()->find($this->video_id);
        $this->settings['allow_comments'] = $this->video->settings()->get('allow_comments', true);
        $this->settings['allow_download'] = $this->video->settings()->get('allow_download', true);
    }

    public function updatedSettings()
    {
        $this->video->settings()->set('allow_comments', $this->settings['allow_comments']);
        $this->video->settings()->set('allow_download', $this->settings['allow_download']);
        $this->emit('settingsUpdated');
    }

    public function render()
    {
        return view('livewire.frontend.channel.partial.settings');
    }
}
