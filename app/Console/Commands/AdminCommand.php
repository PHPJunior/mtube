<?php

namespace App\Console\Commands;

use App\Models\Auth\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email Address');
        $password = $this->secret('Password');

        Admin::create([
            'email' => $email,
            'name' => $name,
            'password' => Hash::make($password),
        ]);

        $this->info('User created successfully.');
    }
}
