<?php

namespace Charis\Http\Controllers;

use Auth;
use Charis\Repositories\User\UserRepository;

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
        return view('User.list', [
          'users' => UserRepository::all()
        ]);
    }
}
