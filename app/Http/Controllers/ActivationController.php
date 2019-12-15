<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ActivationTrait;

class ActivationController extends Controller
{
    use ActivationTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Activate user account
     * 
     * @param int $id
     * @param string $token
     * @return \Illuminate\Http\Response
     */
    public function activate($id, $token)
    {
        $this->activateAccount($id, $token);

        return redirect('/');
    }
}
