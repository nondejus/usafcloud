<?php

namespace App\Models\OAuth;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'oauth_access_tokens';

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'user_id', 'id');
    }
}
