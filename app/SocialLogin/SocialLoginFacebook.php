<?php

namespace App\SocialLogin;

class SocialLoginFacebook implements ISocialLogin
{

    const PROVIDER = 'facebook';


    public function getPermission()
    {
        return \Socialite::with($this::PROVIDER)->redirect();
    }

    
    public function callback()
    {
        $user = \Socialite::with($this::PROVIDER)->user();

        dd($user);
    }
}
