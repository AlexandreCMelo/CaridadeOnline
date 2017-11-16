<?php

namespace Charis\SocialLogin;

class SocialLoginGoogle implements ISocialLogin
{

    const PROVIDER = 'google';


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
