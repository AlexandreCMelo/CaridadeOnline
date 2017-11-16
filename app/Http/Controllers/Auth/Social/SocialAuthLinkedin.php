<?php

namespace Charis\Http\Controllers\Auth\Social;

use Charis\Http\Controllers\Controller;
use Charis\SocialLogin\SocialLoginLinkedin;
use Illuminate\Http\Request;

class SocialAuthLinkedin extends Controller implements ISocialAuth
{

    /**
     * @var App\SocialLogin\SocialLoginLinkedin
     */
    private $provider;


    public function __construct(SocialLoginLinkedin $socialLoginLinkedin)
    {
        $this->provider = $socialLoginLinkedin;
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
