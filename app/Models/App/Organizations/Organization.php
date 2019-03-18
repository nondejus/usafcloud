<?php

namespace App\Models\App\Organizations;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Models\App\Organizations\OrganizationMember;

class Organization extends Model
{
    use Uuids;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function members()
    {
        return $this->hasMany(OrganizationMember::class);
    }
}
