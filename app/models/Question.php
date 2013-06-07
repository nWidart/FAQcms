<?php
class Question extends Eloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions2';

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }

    public function questionsLang()
    {
        return $this->hasMany('QuestionLanguage');
    }
    /**
     * Get the Questions's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function checkQuestion()
    {
        return ( isset( $this->questionsLang->first()->lang ) ) ? true : false;
    }

    public function getLangAttribute()
    {
        return ( isset($this->questionsLang->first()->lang) ) ? $this->questionsLang->first()->lang : '';
    }
    public function getQuestionAttribute()
    {
        return ( isset($this->questionsLang->first()->question) ) ? $this->questionsLang->first()->question : '';
    }
    public function getResponseAttribute()
    {
        return ( isset($this->questionsLang->first()->response) ) ? $this->questionsLang->first()->response : '';
    }
    public function getTitleAttribute()
    {
        return ( isset($this->questionsLang->first()->title) ) ? $this->questionsLang->first()->title : '';
    }
    public function getKeywordsAttribute()
    {
        return ( isset($this->questionsLang->first()->keywords) ) ? $this->questionsLang->first()->keywords : '';
    }
    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return ExpressiveDate::make($this->created_at)->getRelativeDate();
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return ExpressiveDate::make($this->updated_at)->getRelativeDate();
    }
}
