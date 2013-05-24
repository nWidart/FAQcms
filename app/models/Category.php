<?php
class Category extends Eloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    public function questions()
    {
        return $this->hasMany('Question');
    }

    /**
     * Deletes a Question Category and all
     * the associated questions.
     *
     * @return bool
     */
    public function delete()
    {
        // Delete the questions
        $this->questions()->delete();

        // Delete the blog post
        return parent::delete();
    }

    /**
     * Returns the date of the user creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return ExpressiveDate::make($this->created_at)->getRelativeDate();
    }

    /**
     * Returns the date of the user last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return ExpressiveDate::make($this->updated_at)->getRelativeDate();
    }
}
