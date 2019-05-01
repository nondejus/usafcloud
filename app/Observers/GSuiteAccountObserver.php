<?php

namespace App\Observers;

use App\Jobs\DeleteGSuiteAccount;
use App\Models\GSuite\GSuiteAccount;
use App\Jobs\ProvisionGSuiteAccount;

class GSuiteAccountObserver
{
    public function created(GSuiteAccount $gsuite_account)
    {
        ProvisionGSuiteAccount::dispatch($gsuite_account);
    }

    public function deleted(GSuiteAccount $gsuite_account)
    {
        DeleteGSuiteAccount::dispatch($gsuite_account);
    }
}
