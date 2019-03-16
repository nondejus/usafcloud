<?php

namespace App\Models\OAuth;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'oauth_clients';

    public function owner()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }
}
