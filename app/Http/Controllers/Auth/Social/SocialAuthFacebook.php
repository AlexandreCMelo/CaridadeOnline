<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\SocialLogin\SocialLoginFacebook;
use Illuminate\Http\Request;

class SocialAuthFacebook extends Controller implements ISocialAuth
{

    /**
     * @var App\SocialLogin\SocialLoginFacebook
     */
    private $provider;


    public function __construct(SocialLoginFacebook $socialLoginFacebook)
    {
        $this->provider = $socialLoginFacebook;
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
