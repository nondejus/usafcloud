<?php

namespace App\Jobs;

use App\Models\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewGSuiteAccountCreated;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendGSuiteLoginDetailsEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $password;

    public $email_handle;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $email_handle, $password)
    {
        $this->user = $user;
        $this->email_handle = $email_handle;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)
            ->bcc('admin@usaf.cloud')
            ->queue(new NewGSuiteAccountCreated($this->email_handle, $this->password));
    }
}
