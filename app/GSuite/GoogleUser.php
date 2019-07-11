<?php

namespace App\GSuite;

use Illuminate\Support\Str;
use Google_Service_Directory_User as GoogleServiceUser;

class GoogleUser
{
    public $googleUser;

    protected $account;

    protected $owner;

    public function __construct()
    {
        $this->googleUser = new GoogleServiceUser;
        
        return $this;
    }

    public function useAccount($gsuiteAccount)
    {
        $this->account = $gsuiteAccount;

        $this->owner = $this->account->gsuiteable;

        $this->setName($this->owner);

        $this->setEmailHandle($this->account->gsuite_email);

        return $this;
    }

    public function useRandomPassword($length = 16)
    {
        $this->googleUser->setPassword(Str::random($length));

        return $this;
    }

    public function changePasswordNextLogin($bool = true)
    {
        $this->googleUser->setChangePasswordAtNextLogin($bool);

        return $this;
    }

    private function setName($owner)
    {
        $new_user_name = new \Google_Service_Directory_UserName;

        if ($owner instanceof \App\Models\User\User) {
            $new_user_name->setGivenName(ucfirst($owner->first_name));
            $new_user_name->setFamilyName(ucfirst($owner->last_name));
        } elseif ($owner instanceof \App\Models\Organizations\Organization) {
            $new_user_name->setGivenName(ucfirst($owner->name));
            $new_user_name->setFamilyName('USAF.Cloud');
        }

        $this->googleUser->setName($new_user_name);

        return $this;
    }

    public function setEmailHandle($email)
    {
        $this->googleUser->setPrimaryEmail($email);

        return $this;
    }

    public function get()
    {
        return $this->googleUser;
    }
}