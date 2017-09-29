<?php

namespace Charis\Http\Controllers;

use Illuminate\Http\Request;

class RestoreUserController extends \Charis\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * User Account Restore.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $token
     *
     * @return \Illuminate\Http\Response
     */
    public function userReActivate(Request $request, $token)
    {

    }
}