<?php

namespace App\Http\Livewire\Backend\Settings;

use Livewire\Component;

class TranscodingSettings extends Component
{
    public $converted_file_driver;
    public $hls_segment_size;
    public $frame_from_seconds;

    public $success;

    protected $listeners = ['settingsUpdated' => '$refresh'];

    public function mount()
    {
        $this->converted_file_driver = setting('converted_file_driver', config('site.converted_file_driver'));
        $this->hls_segment_size = setting('hls_segment_size', config('site.hls_segment_size'));
        $this->frame_from_seconds = setting('frame_from_seconds', config('site.frame_from_seconds'));
    }

    public function submit()
    {
        $validated = $this->validate([
            'converted_file_driver' => 'required',
            'hls_segment_size' => 'required',
            'frame_from_seconds' => 'required',
        ]);
        foreach ($validated as $key => $value)
        {
            setting()->set($key, $value);
        }

        $this->success = __('Transcoding Settings Updated');
        $this->emit('settingsUpdated');
    }

    public function render()
    {
        return view('livewire.backend.settings.transcoding-settings');
    }
}
