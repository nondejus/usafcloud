<?php

namespace App\Observers;

use App\Models\User\User;
use App\Jobs\DeleteGSuiteAccount;

class UserObserver
{
    public function created(User $user)
    {
        // Create Contact Info Record
        $user->contact()->create();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        // Delete any gsuite accounts
        if ($user->gsuite_accounts()->exists()) {
            $user->gsuite_accounts->map(function ($account) {
                DeleteGSuiteAccount::dispatch($account->gsuite_email);
            });
            $user->gsuite_accounts()->delete();
        }
    }
}
