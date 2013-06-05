<?php
class Question extends Eloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
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
