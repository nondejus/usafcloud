<?php

namespace App\Models\Organizations;

use App\Traits\Uuids;
use App\Models\User\User;
use App\Models\GSuite\GSuiteAccount;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notifications\Notification;

class Organization extends Model
{
    use Uuids;

    protected $guarded = [];

    public $incrementing = false;

    public function members()
    {
        return $this->belongsToMany(User::class, 'organization_members');
    }

    /**
     * Returns a collection of the users notifications
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

    public function gsuite_accounts()
    {
        return $this->morphMany(GSuiteAccount::class, 'gsuiteable');
    }
}
