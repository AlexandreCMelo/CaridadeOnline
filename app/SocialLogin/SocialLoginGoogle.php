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
        $userData = \Socialite::with($this::PROVIDER)->user();
        $user = $this->saveOrRecover($userData);
        $this->auth->login($user, true);
        return redirect(route('home'));
    }


    public function saveOrRecover($userData)
    {
        return User::firstOrCreate(
            ['name' => "$userData->name", 'email' => "$userData->email"]
        );
    }
}
