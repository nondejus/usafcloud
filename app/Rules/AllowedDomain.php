<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllowedDomain implements Rule
{
    /**
     * Allowed email domains for
     * user registration
     *
     * @var array
     */
    protected $allowedDomains = [
        'us.af.mil',
        'usaf.cloud'
    ];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $domain = substr(strrchr($value, "@"), 1);
        if (in_array($domain, $this->allowedDomains)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'We appreciate your interest in joining the squadron. However at the moment we only offer this service to those with us.af.mil or usaf.cloud email addresses.';;
    }
}
