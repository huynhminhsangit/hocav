<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public static function boot()
    {
        parent::boot();

        Slider::observe(new \App\Observers\UserActionsObserver);
    }
    protected $table = 'slider';
    
}
