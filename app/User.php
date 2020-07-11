<?php

namespace App;

//step 7
use App\Events\UserRegisterEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //step 6,, and import userRegisteredEvent
     protected $dispatchesEvents = [
        'created' => UserRegisterEvent::class,
    ];

    //user role check
    public function isRole()
    {
        return $this->role;
    }
}
