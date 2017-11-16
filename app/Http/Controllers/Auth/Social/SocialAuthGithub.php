<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\SocialLogin\SocialLoginGithub;
use Illuminate\Http\Request;

class SocialAuthGithub extends Controller implements ISocialAuth
{

    /**
     * @var App\SocialLogin\SocialLoginGithub
     */
    private $provider;


    public function __construct(SocialLoginGithub $socialLoginGithub)
    {
        $this->provider = $socialLoginGithub;
    }


    public function getPermission()
    {
        return $this->provider->getPermission();
    }

    
    public function callback()
    {
        return $this->provider->callback();
    }
}
