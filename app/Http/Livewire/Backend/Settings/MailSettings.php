<?php

namespace App\Http\Livewire\Backend\Settings;

use Livewire\Component;

class MailSettings extends Component
{
    public $mail_mailer;
    public $mail_from_address;
    public $mail_from_name;
    public $mail_host;
    public $mail_port;
    public $mail_username;
    public $mail_password;
    public $mail_encryption;

    public $mailgun_domain;
    public $mailgun_secret;
    public $mailgun_endpoint;

    public $success;

    protected $listeners = ['settingsUpdated' => '$refresh'];

    public function mount()
    {
        $this->mail_mailer = setting('mail_mailer', 'smtp');
        $this->mail_from_address = setting('mail_from_address', 'no-reply@example.com');
        $this->mail_from_name = setting('mail_from_name', setting('app_name'));
        $this->mail_host = setting('mail_host', 'smtp.mailgun.org');
        $this->mail_port = setting('mail_port', 587);
        $this->mail_username = setting('mail_username');
        $this->mail_password = setting('mail_password');
        $this->mail_encryption = setting('mail_encryption', 'tls');

        $this->mailgun_domain = setting('mailgun_domain', '');
        $this->mailgun_secret = setting('mailgun_secret', '');
        $this->mailgun_endpoint = setting('mailgun_endpoint', 'api.mailgun.net');
    }

    public function render()
    {
        return view('livewire.backend.settings.mail-settings');
    }

    public function submit()
    {
        $validated = $this->validate([
            'mail_mailer' => 'required',
            'mail_from_address' => 'required_if:mail_mailer,smtp',
            'mail_from_name' => 'required_if:mail_mailer,smtp',
            'mail_host' => 'required_if:mail_mailer,smtp',
            'mail_port' => 'required_if:mail_mailer,smtp',
            'mail_username' => 'required_if:mail_mailer,smtp',
            'mail_password' => 'required_if:mail_mailer,smtp',
            'mail_encryption' => 'required_if:mail_mailer,smtp',
            'mailgun_domain' => 'required_if:mail_mailer,mailgun',
            'mailgun_secret' => 'required_if:mail_mailer,mailgun',
            'mailgun_endpoint' => 'required_if:mail_mailer,mailgun'
        ]);

        foreach ($validated as $key => $value)
        {
            setting()->set($key, $value);
        }

        $this->success = __('Mail Settings Updated');
        $this->emit('settingsUpdated');
    }
}
