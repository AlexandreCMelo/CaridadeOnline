<?php

namespace Charis\Http\Controllers\Auth;

class CharisLoginController
{

    protected $redirectTo = '/dashboard';


    public function __controller()
    {
        $this->middleware('guest');
    }



    public function login()
    {
        $var = 1;
        return view('Auth.charislogin');
    }
}
