<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\EmailExample;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class JobExample implements ShouldQueue
{
    use Queueable;

    private $user;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('JobExample executed');
        Notification::send($this->user, new EmailExample($this->user));
    }
}
