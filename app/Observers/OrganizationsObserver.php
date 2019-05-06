<?php

namespace App\Observers;

use App\Models\Organizations\Organization;

class OrganizationsObserver
{
    public function deleted(Organization $organization)
    {
        $organization->gsuite_accounts()->get()->each(function ($account) {
            $account->delete();
        });
    }
}
