<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class UserMilitary extends Model
{
    protected $guarded = [];

    protected $table = 'users_military';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
