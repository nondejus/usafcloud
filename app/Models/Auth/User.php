<?php

namespace App\Models\Auth;

use App\Traits\Uuids;
use Laravel\Passport\Token;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\App\Organizations\Organization;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\App\Organizations\OrganizationMember;

class User extends Authenticatable implements MustVerifyEmail
{
    use Uuids, HasRoles, Notifiable, HasApiTokens;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'email', 'password', 'password_reset_required', 'last_password_reset'
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
        return $this->belongsToMany(Organization::class, 'organization_members', 'user_id', 'organization_id');
    }
}
