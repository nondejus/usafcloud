<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class UserContactInfo extends Model
{
    protected $table = 'users_contact_info';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
