<?php

namespace App\Traits;

use App\Models\GSuite\GSuiteAccount;

/**
 * Has GSuite Accounts
 */
trait HasGSuiteAccounts
{
    public function gsuite_accounts()
    {
        return $this->morphMany(GSuiteAccount::class, 'gsuiteable');
    }
}
