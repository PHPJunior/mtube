<?php

namespace App\Http\Livewire\Frontend\Channel;

use App\Models\Channel\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewChannel extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'channelUpdated' => '$refresh',
    ];

    public $channel_id;
    public $channel;
    public $tab = 'contents';

    public $picture;
    public $picture_success;

    public $banner;
    public $banner_success;

    public $watermark;
    public $watermark_success;

    public function updatedPicture()
    {
        $this->validate([
            'picture' => 'image|max:98',
        ]);
    }

    public function savePicture()
    {
        $name = 'channel/' . $this->channel->id . '/profile_picture.png';
        $this->picture->storeAs('channel/' . $this->channel->id, 'profile_picture.png', $this->channel->disk);
        if (!$this->channel->profile_picture)
        {
            $this->channel->update([
                'profile_picture' => $name
            ]);
        }
        $this->picture_success = __('Profile Picture Updated');
    }

    public function updatedBanner()
    {
        $this->validate([
            'banner' => 'image|max:2048',
        ]);
    }

    public function saveBanner()
    {
        $name = 'channel/' . $this->channel->id . '/banner_image.png';
        $this->banner->storeAs('channel/' . $this->channel->id, 'banner_image.png', $this->channel->disk);
        if (!$this->channel->banner_image)
        {
            $this->channel->update([
                'banner_image' => $name
            ]);
        }
        $this->banner_success = __('Banner Image Updated');
    }

    public function updatedWatermark()
    {
        $this->validate([
            'watermark' => 'image|max:150',
        ]);
    }

    public function saveWatermark()
    {
        $name = 'channel/' . $this->channel->id . '/watermark.png';
        $this->watermark->storeAs('channel/' . $this->channel->id, 'watermark.png', $this->channel->disk);
        if (!$this->channel->video_watermark)
        {
            $this->channel->update([
                'video_watermark' => $name
            ]);
        }
        $this->watermark_success = __('Watermark Updated');
    }

    public function updateTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->channel = Channel::query()->find($this->channel_id);
    }

    public function render()
    {
        return view('livewire.frontend.channel.view-channel');
    }
}
