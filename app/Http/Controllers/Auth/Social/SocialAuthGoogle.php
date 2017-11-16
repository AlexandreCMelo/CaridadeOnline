<?php

namespace Charis\Http\Controllers\Auth\Social;

use Charis\Http\Controllers\Controller;
use Charis\SocialLogin\SocialLoginGoogle;
use Illuminate\Http\Request;

class SocialAuthGoogle extends Controller
{

    /**
     * @var App\SocialLogin\SocialLoginGoogle
     */
    private $provider;


    public function __construct(SocialLoginGoogle $socialLoginGoogle)
    {
        $this->provider = $socialLoginGoogle;
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
