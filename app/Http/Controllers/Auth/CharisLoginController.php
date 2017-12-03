<?php

namespace Charis\Http\Controllers\Auth;

use Charis\Http\Controllers\Controller;

class CharisLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }



    public function login()
    {
        return view('Auth.charislogin');
    }
}
