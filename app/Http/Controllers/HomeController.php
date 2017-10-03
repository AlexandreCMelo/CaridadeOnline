<?php

namespace Charis\Http\Controllers;


class HomeController extends \Charis\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.home');
    }

    public function home()
    {
        return view('home');
    }
}
