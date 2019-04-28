<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    public function create()
    {
        return (auth()->user()->can('users:create')) ? true : false;
    }

    public function view()
    {
        return (auth()->user()->can('users:view')) ? true : false;
    }

    public function update()
    {
        return (auth()->user()->can('users:update')) ? true : false;
    }

    public function delete()
    {
        return (auth()->user()->can('users:destroy')) ? true : false;
    }
}
