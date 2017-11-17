<?php

namespace Charis\SocialLogin;

use Illuminate\Contracts\Auth\Guard as Authenticator;

class SocialLoginFacebook implements ISocialLogin
{

    const PROVIDER = 'facebook';


    public $auth;


    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }


    public function getPermission()
    {
        return \Socialite::with($this::PROVIDER)->redirect();
    }


    public function callback()
    {
        $user = \Socialite::with($this::PROVIDER)->user();
        $this->auth->login($user, true);
        return redirect(route('home'));
    }


    public function saveOrRecover($userData)
    {
        return User::firstOrCreate(
            ['name' => $userData->name, 'email' => $userData->email]
        );
    }

}
