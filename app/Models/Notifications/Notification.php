<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    protected $table = 'notifications';

    public function notifiable()
    {
        return $this->morphTo();
    }
}
