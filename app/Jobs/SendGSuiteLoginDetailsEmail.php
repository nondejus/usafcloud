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
use App\Models\GSuite\GSuiteAccount;

class SendGSuiteLoginDetailsEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $gsuite_account;

    public $password;

    public $email_handle;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GSuiteAccount $gsuite_account, $password)
    {
        $this->gsuite_account = $gsuite_account;
        $this->email_handle = $gsuite_account->gsuite_email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->gsuite_account->gsuiteable->email)
            ->bcc('admin@usaf.cloud')
            ->queue(new NewGSuiteAccountCreated($this->email_handle, $this->password));
    }
}
