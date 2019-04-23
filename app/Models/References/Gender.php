<?php

namespace App\Models\References;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'title',
        'display_order',
        'active',
    ];
}
