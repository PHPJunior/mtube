<?php

namespace App\Http\Livewire\Backend\Settings;

use Livewire\Component;

class FilesystemSettings extends Component
{
    public $aws_access_key_id;
    public $aws_secret_access_key;
    public $aws_default_region;
    public $aws_bucket;
    public $aws_url;
    public $aws_endpoint;

    public $success;

    protected $listeners = ['settingsUpdated' => '$refresh'];

    public function mount()
    {
        $this->aws_access_key_id = setting('aws_access_key_id');
        $this->aws_secret_access_key = setting('aws_secret_access_key');
        $this->aws_default_region = setting('aws_default_region');
        $this->aws_bucket = setting('aws_bucket');
        $this->aws_url = setting('aws_url');
        $this->aws_endpoint = setting('aws_endpoint');
    }

    public function submit()
    {
        $validated = $this->validate([
            'aws_access_key_id' => 'required',
            'aws_secret_access_key' => 'required',
            'aws_default_region' => 'required',
            'aws_bucket' => 'required',
            'aws_url' => 'required',
            'aws_endpoint' => 'required',
        ]);
        foreach ($validated as $key => $value)
        {
            setting()->set($key, $value);
        }

        $this->success = __('Filesystem Settings Updated');
        $this->emit('settingsUpdated');
    }

    public function render()
    {
        return view('livewire.backend.settings.filesystem-settings');
    }
}
