<?php namespace Controllers\Admin;

use AdminController,
    Config,
    Input,
    Lang,
    Redirect,
    Sentry,
    Validator,
    View,
    Question,
    QuestionLanguage,
    Category,
    ChromePhp;

class QuestionsController extends AdminController
{
    protected $validationRules = array(
        'priority'   => 'required|integer',
        'category'   => 'required',
        'question'   => 'required',
        'lang'       => 'required'
    );

    /**
     * Show a list of all the questions.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the questions
        $questions = Question::with(['category', 'questionsLang'])->paginate(20);

        if (Input::get('lang'))
        {
            $questions = Question::with(['category', 'questionsLang' => function ($query)
            {
                $query->whereLang(Input::get('lang'));
            }])->paginate(20);
        }

        // Show the page
        return View::make('admin/questions/index', compact('questions'));
    }

    public function postIndex()
    {
        // Grab the input
        $searchInput = Input::get('search');
        // Search the questions
        $questions = Question::where('question_fr', 'LIKE', '%' . $searchInput . '%')
                        ->orWhere('question_en', 'LIKE', '%' . $searchInput . '%')
                        ->paginate(20);
        // return Response::json( $questions );
        return View::make('admin/questions/index', compact('questions'));
    }

    /**
     * Question create.
     *
     * @return View
     */
    public function getCreate()
    {
        //
        $questions = Question::with('questionsLang')->all();
        foreach ($questions as $question)
        {

        }

        // Grab all the categories
        $categories = Category::all();
        // Show the page
        return View::make('admin/questions/create', compact('categories'));
    }

    /**
     * Question create form processing.
     *
     * @return Redirect
     */
    public function postCreate()
    {
        // Validate the inputs
        $validator = Validator::make( Input::all(), $this->validationRules );
        if ( $validator->passes() )
        {
            // Create new question
            $question                   = new Question;
            $question->category_id      = Input::get('category');
            $question->priority         = Input::get('priority');
            $question->active           = ( Input::get('actif') ) ? 1 : 0 ;
            $question->public           = ( Input::get('public') ) ? 1 : 0 ;
            $question->save();

            $questionContent           = new QuestionLanguage;
            $questionContent->question = Input::get('question');
            $questionContent->response = Input::get('response');
            $questionContent->title    = Input::get('title');
            $questionContent->keywords = Input::get('keywords');
            $questionContent->lang     = Input::get('lang');
            $questionContent->question_id = $question->id;

            // Was the question created?
            if( $questionContent->save() )
            {
                // Redirect to the new blog post page
                return Redirect::to('admin/questions/' . $question->id . '/edit')->with('success', Lang::get('admin/questions/messages.create.success'));
            }

            // Redirect to the blog post create page
            return Redirect::to('admin/questions/create')->with('error', Lang::get('admin/questions/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/questions/create')->withInput()->withErrors($validator);
    }

    /**
     * Question update.
     *
     * @param  int  $questionId
     * @return View
     */
    public function getEdit($questionId = null)
    {
        // Check if the question exists
        if ( is_null(Question::find($questionId)) )
        {
            // Redirect to the questions management page
            return Redirect::to('admin/questions')->with('error', Lang::get('admin/questions/messages.does_not_exist'));
        }
        $question = Question::whereId($questionId)->with('category', 'questionsLang')->first();
        $categories = Category::all();
        // Show the page
        return View::make('admin/questions/edit', compact('question', 'categories'));
    }

    /**
     * Question update form processing page.
     *
     * @param  int  $questionId
     * @return Redirect
     */
    public function postEdit($questionId = null)
    {
        // Check if the question exists
        if ( is_null($question = Question::find($questionId)) )
        {
            // Redirect to the questions management page
            return Redirect::to('admin/questions')->with('error', Lang::get('admin/questions/messages.does_not_exist'));
        }

        // Validate the inputs
        $validator = Validator::make(Input::all(), $this->validationRules);

        // Check if the form validates with success
        if ( $validator->passes() )
        {
            // Update the question data
            $question->category_id      = Input::get('category');
            $question->priority         = Input::get('priority');
            $question->active            = ( Input::get('actif') ) ? 1 : 0 ;
            $question->public           = ( Input::get('public') ) ? 1 : 0 ;

            $questionContent = QuestionLanguage::find( $question->questionsLang->first()->id );
            $questionContent->question = Input::get('question');
            $questionContent->response = Input::get('response');
            $questionContent->title = Input::get('title');
            $questionContent->keywords = Input::get('keywords');
            $questionContent->lang = Input::get('lang');

            // Was the question updated?
            if( $question->questionsLang()->save( $questionContent ) )
            {
                // Redirect to the new question page
                return Redirect::to('admin/questions/' . $questionId . '/edit')->with('success', Lang::get('admin/questions/messages.update.success'));
            }

            // Redirect to the questions management page
            return Redirect::to('admin/questions/' . $questionId . '/edit')->with('error', Lang::get('admin/questions/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/questions/' . $questionId . '/edit')->withInput()->withErrors($validator);
    }

    /**
     * Delete the given question.
     *
     * @param  int  $questionId
     * @return Redirect
     */
    public function getDelete($questionId)
    {
        // Check if the blog question exists
        if ( is_null( $question = Question::find($questionId)) )
        {
            // Redirect to the questions management page
            return Redirect::to('admin/questions')->with('error', Lang::get('admin/questions/messages.not_found'));
        }

        // Was the question deleted?
        if( $question->delete() )
        {
            // Redirect to the questions management page
            return Redirect::to('admin/questions')->with('success', Lang::get('admin/questions/messages.delete.success'));
        }

        // There was a problem deleting the question
        return Redirect::to('admin/questions')->with('error', Lang::get('admin/questions/messages.delete.error'));
    }
}
