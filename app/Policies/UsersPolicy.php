<?php

namespace App\Policies;

use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        return (auth()->user()->hasRole('super-admin')) ? true : false;
    }

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

    public function delete(User $user)
    {
        if (auth()->user()->can('users:destroy') && auth()->user()->id <> $user->id) {
            return true;
        }

        return false;
    }
}
