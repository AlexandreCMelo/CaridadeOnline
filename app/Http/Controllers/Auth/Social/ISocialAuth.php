<?php

namespace Charis\Http\Controllers\Auth\Social;


interface ISocialAuth
{
    public function getPermission();

    public function callback();
}
