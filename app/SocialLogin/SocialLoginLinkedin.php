<?php

namespace Charis\SocialLogin;

class SocialLoginLinkedin implements ISocialLogin
{

    const PROVIDER = 'linkedin';


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
