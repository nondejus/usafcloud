<?php

namespace App\Models\App\Organizations;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\App\Organizations\Organization;

class OrganizationMember extends Model
{
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
