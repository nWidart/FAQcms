<?php
class QuestionLanguage extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions_lang';
    public $timestamps = false;

    public function language()
    {
        return $this->belongsTo('Language', 'language_id');
    }

    public function question()
    {
        return $this->belongsTo('Question', 'question_id');
    }
}
