<?php

namespace App\Models\GSuite;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class GSuiteAccount extends Model
{
    protected $guarded = [];
    protected $table = 'gsuite_accounts';

    public function gsuiteable()
    {
        return $this->morphTo();
    }

    public static function ensureUniqueEmailAddress($base_email)
    {
        $count = self::where('gsuite_email', $base_email)->count();
        if ($count <> 0) {
            $base_name = explode('@', $base_email)[0];
            if (is_numeric(substr($base_name, -1, 1))) {
                $base_name = ++$base_name;
            } else {
                $base_name = $base_name . '.1';
            }
            $base_email = $base_name . '@usaf.cloud';
            $base_email = self::ensureUniqueEmailAddress($base_email);
        }
        return strtolower($base_email);
    }
}
