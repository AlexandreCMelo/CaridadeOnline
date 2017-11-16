<?php

namespace App\SocialLogin;

interface ISocialLogin
{

  public function getPermission();

  public function callback();

}
