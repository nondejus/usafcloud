<?php

namespace App\Policies;

use Log;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationsPolicy
{
    use HandlesAuthorization;

    public function delete()
    {
        if (auth()->user()->can('organizations:destroy')) {
            return true;
        }
    }
}
