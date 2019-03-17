<?php

namespace App\Models\App\Organizations;

use App\Traits\Uuids;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Uuids;

    public function members()
    {
        return $this->hasMany(User::class, 'id', 'member_id');
    }
}
