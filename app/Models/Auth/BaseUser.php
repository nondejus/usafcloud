<?php

namespace App\Models\Auth;

use App\Traits\Uuids;
use Laravel\Passport\Token;
use Laravel\Passport\HasApiTokens;
use App\Jobs\ProvisionGSuiteAccount;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\App\Organizations\Organization;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BaseUser extends Authenticatable implements MustVerifyEmail
{
    use Uuids, HasRoles, Notifiable, HasApiTokens;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'email', 'avatar', 'password', 'password_reset_required', 'last_password_reset'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function applications()
    {
        return $this->hasMany(Token::class, 'user_id', 'id')->where('revoked', false);
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_members', 'user_id', 'organization_id')->withTimestamps();
    }

    public function joinOrganization(Organization $organization)
    {
        $this->organizations()->attach($organization->id);
    }

    public function leaveOrganization(Organization $organization)
    {
        $this->organizations()->detach($organization->id);
    }

    public function provisionGSuiteAccount()
    {
        if (!$this->gsuite_user) {
            ProvisionGSuiteAccount::dispatch($this);
        }
    }
}