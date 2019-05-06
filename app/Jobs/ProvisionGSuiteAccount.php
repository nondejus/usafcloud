<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\GSuite\GoogleDirectory;
use App\Models\GSuite\GSuiteAccount;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProvisionGSuiteAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $gsuite_account;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GSuiteAccount $gsuite_account)
    {
        $this->gsuite_account = $gsuite_account;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $directory = new GoogleDirectory;
        $directory->provision($this->gsuite_account);
        $this->updateAccountStatus();
    }

    public function updateAccountStatus()
    {
        $this->gsuite_account->update([
            'creating' => false,
            'ready' => true,
        ]);
    }
}
