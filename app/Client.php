<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{
    public static function boot()
    {
        parent::boot();

        Client::observe(new \App\Observers\UserActionsObserver);
    }
    protected $fillable = [
        'name', 'email','id_auth','avatar'
    ];
    protected $table = 'client';
    protected $guard = "client";
    
}
