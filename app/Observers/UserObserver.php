<?php

namespace App\Observers;

use App\Models\User\User;
use App\Models\GSuite\GSuiteAccount;

class UserObserver
{
    public function created(User $user)
    {
        $user->contact()->create();
    }

    public function deleted(User $user)
    {
        $user->gsuite_accounts()->get()->each(function ($account) {
            GSuiteAccount::where('id', $account->id)->first()->delete();
        });
    }
}
