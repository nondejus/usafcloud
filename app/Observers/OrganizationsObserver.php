<?php

namespace App\Observers;

use App\Jobs\DeleteGSuiteAccount;
use App\Models\App\Organizations\Organization;

class OrganizationsObserver
{
    /**
     * Handle the Organization "deleted" event.
     *
     * @param  \App\Models\Organizations\Organization  $organization
     * @return void
     */
    public function deleted(Organization $organization)
    {
        // Delete any gsuite accounts
        if ($organization->gsuite_accounts()->exists()) {
            $organization->gsuite_accounts->map(function ($account) {
                DeleteGSuiteAccount::dispatch($account->gsuite_email);
            });
            $organization->gsuite_accounts()->delete();
        }
    }
}
