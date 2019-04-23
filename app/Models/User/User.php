<?php

namespace App\Models\User;

use App\Traits\Uuids;
use App\Models\References\Gender;
use Laravel\Passport\HasApiTokens;
use App\Models\User\UserContactInfo;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\App\Organizations\Organization;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Uuids, HasRoles, Notifiable, HasApiTokens;

    public $incrementing = false;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Returns the users contact info
     * @return UserContactInfo::class
     */
    public function contact()
    {
        return $this->hasOne(UserContactInfo::class);
    }

    /**
     * Returns a collection of the organizations that the user is a part of
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_members', 'user_id', 'organization_id')->withTimestamps();
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Add a user to an organization
     */
    public function joinOrganization(Organization $organization)
    {
        $this->organizations()->attach($organization->id);
    }

    /**
     * Remove a user from an organization
     */
    public function leaveOrganization(Organization $organization)
    {
        $this->organizations()->detach($organization->id);
    }

    // public function provisionGSuiteAccount()
    // {
    //     if (!$this->gsuite_user) {
    //         ProvisionGSuiteAccount::dispatch($this);
    //     }
    // }
}
