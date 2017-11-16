<?php

namespace Charis\Http\Controllers\Auth\Social;

use Charis\Http\Controllers\Controller;
use Charis\SocialLogin\SocialLoginFacebook;
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
