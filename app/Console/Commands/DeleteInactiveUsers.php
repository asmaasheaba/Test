<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteInactiveUsers extends Command
{
    protected $signature = 'user:Delete_Inactive_Users';
    
    protected $description = 'delete users which status are not active';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $count = User::where('status', 'not active')->delete();

        $this->info($count . ' users deleted successfully.');
    }
}