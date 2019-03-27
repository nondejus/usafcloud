<?php

namespace App\Models\Auth;

use App\Models\Auth\BaseUser;
use OwenIt\Auditing\Contracts\Auditable;

class User extends BaseUser implements Auditable
{
    use \OwenIt\Auditing\Auditable;
}
