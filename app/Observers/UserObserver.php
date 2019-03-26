<?php

namespace App\Observers;

use App\Models\Auth\User;
use App\Jobs\DeleteGSuiteAccount;

class UserObserver
{
    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        if ($user->gsuite_user) {
            DeleteGSuiteAccount::dispatch($user->gsuite_email);
        }
    }
}
