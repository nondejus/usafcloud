<?php

namespace App\Jobs;

use App\Models\User\User;
use Illuminate\Bus\Queueable;
use App\GSuite\GoogleDirectory;
use App\Models\GSuite\GSuiteAccount;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\App\Organizations\Organization;

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
        if ($this->gsuite_account->gsuiteable instanceof User) {
            $type = User::class;
        } elseif ($this->gsuite_account->gsuiteable instanceof Organization) {
            $type = Organization::class;
        }

        $account = GSuiteAccount::where([
            'gsuiteable_id' => $this->gsuite_account->id,
            'gsuiteable_type' => $type,
            'gsuite_email' => $this->gsuite_account->gsuite_email
        ])->first();

        if ($account) {
            $account->update([
                'creating' => false,
                'ready' => true,
            ]);
        }
    }
}
