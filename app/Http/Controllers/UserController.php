<?php

namespace Charis\Http\Controllers;

use Auth;

class UserController extends \Charis\Http\Controllers\Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.home');
    }
}
