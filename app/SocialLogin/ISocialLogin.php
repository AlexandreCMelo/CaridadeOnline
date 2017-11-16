<?php

namespace Charis\SocialLogin;

interface ISocialLogin
{

  public function getPermission();

  public function callback();

}
