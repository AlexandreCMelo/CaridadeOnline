<?php

namespace App\SocialLogin;

class SocialLoginGithub implements ISocialLogin
{

    const PROVIDER = 'github';


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
