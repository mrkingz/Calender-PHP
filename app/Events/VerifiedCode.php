<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

class VerifiedCode
{
    use SerializesModels;

    /**
     * Instance of User.
     *
     * @var App\User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
