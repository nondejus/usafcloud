<?php

namespace App\Models\User;

use App\Traits\Uuids;
use App\Models\References\Gender;
use App\Models\User\UserMilitary;
use Laravel\Passport\HasApiTokens;
use App\Models\User\UserContactInfo;
use App\Models\GSuite\GSuiteAccount;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Notifications\Notification;
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

    public function apps()
    {
        return $this->hasMany(\Laravel\Passport\Token::class);
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
     * Returns the users military info
     * @return UserMilitary::class
     */
    public function military()
    {
        return $this->hasOne(UserMilitary::class);
    }

    /**
     * Returns a collection of the users notifications
     */
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    /**
     * Returns the users gender info
     * @return Gender::class
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Returns a collection of the organizations that the user is a part of
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_members', 'user_id', 'organization_id')->withTimestamps();
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

    public function gsuite_accounts()
    {
        return $this->morphMany(GSuiteAccount::class, 'gsuiteable');
    }
}
