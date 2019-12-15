<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/schedules/new';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return redirect('/');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        switch($user->active)
        {
            // User is on the registration stage
            // We will redirect user to the verification page
            case User::REGISTRATION:
                return redirect('/registration/verification');

            // User has completed registration and verification stage
            // But has not activated his/her account
            // We will logout user and respond with a flash message
            case User::VERIFICATION:
                $this->guard()->logout();

                Session::flash('error', trans('messages.inactive'));
                
                return redirect()->back()
                        ->withInput()
                        ->withErrors([$this->username() => ' ']);

            // Registration, verification and activated completed
            // We will redirect user to the home page
            case User::ACTIVATION:
                return redirect($this->redirectTo);
        }
    }
}
