<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public static function boot()
    {
        parent::boot();

        Banner::observe(new \App\Observers\UserActionsObserver);
    }
    protected $table = 'banner';
    
}
