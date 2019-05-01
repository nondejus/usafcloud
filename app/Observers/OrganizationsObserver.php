<?php

namespace App\Observers;

use App\Models\App\Organizations\Organization;
use App\Models\GSuite\GSuiteAccount;

class OrganizationsObserver
{
    public function deleted(Organization $organization)
    {
        $organization->gsuite_accounts()->get()->each(function ($account) {
            GSuiteAccount::where('id', $account->id)->first()->delete();
        });
    }
}
