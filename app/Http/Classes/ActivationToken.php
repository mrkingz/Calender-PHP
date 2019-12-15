<?php

namespace App\Http\Classes;

use App\User;
use App\Activation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AccountActivation;

class ActivationToken
{

    /**
     * The hash key.
     * 
     * @var $hashKey 
     */
    protected $hashKey;

    /**
     * Create a new ActivationToken instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->hashKey = config('app.key');
    }

    /**
     * Create a new token for the user.
     *
     * @return string
     */
    public function generateToken()
    {
        if (Str::startsWith($this->hashKey, 'base64:')) {
            $this->hashKey = base64_decode(substr($this->hashKey, 7));
        }

        return hash_hmac('sha256', Str::random(40), $this->hashKey);
    }


    /**
     * Save activation token and fire notification event.
     *
     * @return string 
     */
    public function createToken($user)
    {
        $token = $this->generateToken();

        $response = Activation::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);
        
        is_null($response) ?: $user->notify(new AccountActivation($token));
    }
}

