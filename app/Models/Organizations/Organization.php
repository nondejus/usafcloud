<?php

namespace App\Models\Organizations;

use App\Traits\Uuids;
use App\Models\User\User;
use App\Models\GSuite\GSuiteAccount;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notifications\Notification;
use App\Traits\HasGSuiteAccounts;

class Organization extends Model
{
    use Uuids, HasGSuiteAccounts;

    protected $guarded = [];

    public $incrementing = false;

    public function members()
    {
        return $this->belongsToMany(User::class, 'organization_members');
    }

    /**
     * Returns a collection of notifications
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function addUser(User $user)
    {
        $this->members()->attach($user->id);

        return $this->members();
    }
}
