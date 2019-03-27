<?php

namespace App\Models\App\Organizations;

use App\Traits\Uuids;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Uuids;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function members()
    {
        return $this->belongsToMany(User::class, 'organization_members');
    }

    public function addUser(User $user)
    {
        $this->members()->attach($user->id);

        return $this->members();
    }
}
