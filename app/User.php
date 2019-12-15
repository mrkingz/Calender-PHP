<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ACTIVATION = 2;

    const VERIFICATION = 1;

    const REGISTRATION = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the activation record associated with the user.
     */
    public function activation()
    {
        return $this->hasOne('App\Activation');
    }

    /**
     * Determine if account has been activated
     * 
     * @return bool  
     */
    public function isActivated() 
    {
        return $this->active == static::ACTIVATION;
    }

    /**
     * Determine if phone number has not been verified
     * 
     *  @return bool
     */
    public function isUnverified()
    {
        return $this->active == static::REGISTRATION;
    }

    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }

    /**
     * Get the schedules belonging to this user.
     */    
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    /**
     * Get the verification record associated with the user.
     */
    public function verification()
    {
        return $this->hasOne('App\Verification');
    }    
}
