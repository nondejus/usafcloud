<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationsPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        return (auth()->user()->hasRole('super-admin')) ? true : false;
    }

    public function create()
    {
        return (auth()->user()->can('organizations:create')) ? true : false;
    }

    public function view()
    {
        return (auth()->user()->can('organizations:view')) ? true : false;
    }

    public function update()
    {
        return (auth()->user()->can('organizations:update')) ? true : false;
    }

    public function delete()
    {
        return (auth()->user()->can('organizations:destroy')) ? true : false;
    }
}
