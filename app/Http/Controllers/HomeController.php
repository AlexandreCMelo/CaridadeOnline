<?php

namespace Charis\Http\Controllers;


class HomeController extends \Charis\Http\Controllers\Controller
{

    /**
     * HomeController constructor.
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


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('Dashboard.home');
    }
}
