<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @package App
 * @property string $topic
 * @property text $question_text
 * @property text $code_snippet
 * @property text $answer_explanation
 * @property string $more_info_link
*/
class Question extends Model
{

    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'topic_id'];


    /**
     * Set to null if empty
     * @param $input
     */

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id');
    }
}
