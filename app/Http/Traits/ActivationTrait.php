<?php 

namespace App\Http\Traits;

use App\User;
use App\Activation;
use App\Verification;
use Illuminate\Support\Facades\Session;

trait ActivationTrait
{

    /**
     * Activate user account
     * 
     * @param App\User $user
     * @param string $token
     * @return 
     */
    protected function activateAccount($id, $token)
    {
        $user = $this->checkUser($id);

        // We need to make sure user exists and token is valid
        if (! $user || ! $this->checkToken($user,  $token)) {
            $this->response('error', 'messages.link');
        } else if ($user->isActivated()) {
            $this->response('info', 'messages.active');
        }  else {
            // Update user to activated
            $user->active = User::ACTIVATION;

            $user->save();

            $this->delete($user->activation->user_id);

            $this->response('success', 'messages.activated');
        }
    }

    /**
     * Determine if user id is valid
     * 
     * @param int $id
     * @return App\User
     */
    protected function checkUser($id)
    {
        return User::with('activation')->find($id);
    }

    /**
     * Determine if the request token is valid
     * 
     * @param App\User $user
     * @param string $token
     * @return bool
     */
    protected function checkToken($user, $token)
    {
        return $user->activation->token == $token;
    }

    /**
     * Delete user activation record
     *
     * @param int $id
     * @return void
     */
    protected function delete($id) 
    {
        Activation::where('user_id', $id)->delete();
    }

    /**
     * 
     * 
     */
    protected function response($type, $messageKey)
    {
        Session::flash($type, trans($messageKey));
    }
}