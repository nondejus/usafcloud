<?php

namespace App\Observers;

use App\Models\User\User;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $user)
    {
        // Create contact record
        $user->contact()->create();

        // Send the user a welcome email
        Mail::to($user->email)
            ->bcc('admin@usaf.cloud')
            ->queue(new AccountCreated($user));
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        $user->gsuite_accounts()->get()->each(function ($account) {
            $account->delete();
        });
    }
}
