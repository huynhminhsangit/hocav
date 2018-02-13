<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAction
 *
 * @package App
 * @property string $user
 * @property string $action
 * @property string $action_model
 * @property integer $action_id
*/
class UserAction extends Model
{
    protected $table = 'user_actions';
    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
    
}
