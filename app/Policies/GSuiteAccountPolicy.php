<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class GSuiteAccountPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        return (auth()->user()->hasRole('super-admin')) ? true : false;
    }

    public function create()
    {
        return (auth()->user()->can('gsuite:create')) ? true : false;
    }

    public function delete()
    {
        return (auth()->user()->can('gsuite:destroy')) ? true : false;
    }

    public function suspend()
    {
        return (auth()->user()->can('gsuite:suspend')) ? true : false;
    }
}
