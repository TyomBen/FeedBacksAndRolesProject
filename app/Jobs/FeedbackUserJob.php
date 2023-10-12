<?php

namespace App\Jobs;

use App\Mail\FeedBackMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class FeedbackUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $admin;
    /**
     * Create a new job instance.
     */
    public function __construct($user, $admin)
    {
        $this->admin = $admin;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->admin)->send(new FeedBackMail($this->admin, $this->user));
    }
}
