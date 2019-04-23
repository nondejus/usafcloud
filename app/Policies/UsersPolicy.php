<?php

namespace App\Policies;

use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function view()
    {
        return (auth()->user()->can('users:view')) ? true : false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function create()
    {
        return (auth()->user()->can('users:create')) ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function update()
    {
        return (auth()->user()->can('users:update')) ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        if (auth()->user()->can('users:destroy')) {
            return true;
        }
    }
}
