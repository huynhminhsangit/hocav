<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @package App
 * @property string $title
*/
class Test extends Model
{

    protected $fillable = ['user_id', 'result'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
