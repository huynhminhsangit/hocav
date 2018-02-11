<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordToken;

class User extends Authenticatable
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
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    } 
    public function phuong()
    {
       return $this->role == 1;
    }
    public function vumap()
    {
        return $this->role == 2;

        return false;
    }
    public function chidat()
    {
        return $this->role == 3;
    }
    public function hiepgays()
    {
        return $this->role == 4;
    }
}
