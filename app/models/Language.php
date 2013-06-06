<?php
class Language extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';
    public $timestamps = false;

    public function questions()
    {
        return $this->hasMany('QuestionLanguage');
    }

}
