<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Classes\VerificationCode;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
{
    /**
     * Instance of App\Http\Classes\verificationCode 
     * 
     * @var $verification
     */
    protected $verification;

    /**
     * Create a new controller instance.
     *
     * @param App\Http\Classes\VerificationCode $verification
     * @return void
     */
    public function __construct(VerificationCode $verification) 
    {
        $this->middleware('auth');

        $this->verification = $verification;
    }

    /**
     * Update the specified resource in storage.
     *w
     * @param App\User $user
     * @return string
     */
    protected function update(User $user)
    {
        return $this->verification->resetCode($user);
    }

    /**
     * Confirm verification code
     * 
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6'
        ]);
        
        // If verification is successfull, response will be null
        $response =  $this->verification->verifyCode($request->code);

        if (is_null($response)) {
            Session::flash('info', trans('messages.verified'));

            // Logout the authenticated user
            Auth::guard()->logout();

            return redirect('/');            
        }

        return redirect()->back()
                ->withInput()
                ->withErrors(['code' => $response]);
    }
}
