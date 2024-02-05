<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class Deactive_Users extends Command
{
    protected $signature = 'user:deactivate_users';
    
    protected $description = 'Deactivate users which email contain "test"';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('email', 'like', '%test%')->get();
        $countUsers = 0;

        foreach ($users as $user) {
            $user->status = 'not active';
            $user->save();
            $countUsers++;
        }

        $this->info($countUsers . ' users  deactivated successfully.');
    }
}