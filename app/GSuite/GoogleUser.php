<?php

namespace App\GSuite;

use Illuminate\Support\Str;

class GoogleUser
{
    public $googleUser;

    protected $account;

    public function __construct()
    {
        $this->googleUser = new \Google_Service_Directory_User;
        
        return $this;
    }

    public function useAccount($gsuiteAccount)
    {
        $this->account = $gsuiteAccount;

        $this->setName($this->account->gsuiteable);

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