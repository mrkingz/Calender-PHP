<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'getIndex']);
    }

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {   
        return view('index');
    }

    /**
     * Show the application confirmation page during registration
     *
     * @return \Illuminate\Http\Response
     */
    public function getVerification()
    {
        return view('auth.verification');
    }
}
