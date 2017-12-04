<?php

namespace Charis\SocialLogin;

use Illuminate\Contracts\Auth\Guard as Authenticator;
use Charis\Models\User;

class SocialLogin
{
    public $auth;


    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }


    public function getPermission($provider)
    {
        return \Socialite::with($provider)->redirect();
    }


    public function callback($provider)
    {
        $userData = \Socialite::with($provider)->user();
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
