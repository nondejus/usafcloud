<?php

namespace App\Models\Apps;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    protected $table = 'oauth_clients';
}
