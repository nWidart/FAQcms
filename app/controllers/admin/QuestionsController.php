<?php namespace Controllers\Admin;

use AdminController;
use Config;
use Input;
use Lang;
use Redirect;
use Sentry;
use Validator;
use View;
use Question;

class QuestionsController extends AdminController
{

    /**
     * Show a list of all the questions.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the questions
        $questions = Question::with('category')->orderBy('category_id', 'ASC')->orderBy('category_id_2', 'ASC')->orderBy('category_id_3', 'ASC')->orderBy('priority', 'ASC')->paginate(20);

        // Show the page
        return View::make( 'admin/questions/index', compact('questions') );
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
        return View::make( 'admin/questions/index', compact('questions') );
    }

    /**
     * Question create.
     *
     * @return View
     */
    public function getCreate()
    {
        $categories = Category::all();
        // Show the page
        return View::make('admin/questions/create', compact('categories') );
    }

    /**
     * Question create form processing.
     *
     * @return Redirect
     */
    public function postCreate()
    {
        // Declare the rules for the form validation
        $rules = array(
            'priority'   => 'required|integer',
            'category' => 'required',
            'question_fr' => 'required',
        );
        // Validate the inputs
        $validator = Validator::make( Input::all(), $rules );
        if ($validator->passes() )
        {
            // Create new question
            $question = new Question;

            // The data
            $question->category_id      = Input::get('category');
            $question->priority         = Input::get('priority');
            $question->actif            = ( Input::get('actif') ) ? 1 : 0 ;
            $question->public           = ( Input::get('public') ) ? 1 : 0 ;
            $question->checked          = ( Input::get('checked') ) ? 1 : 0 ;
            $question->question_fr      = Input::get('question_fr');
            $question->reponse_fr       = Input::get('reponse_fr');
            $question->title_fr         = Input::get('title_fr');
            $question->keywords_fr      = Input::get('keywords_fr');
            $question->question_en      = Input::get('question_en');
            $question->reponse_en       = Input::get('reponse_en');
            $question->title_en         = Input::get('title_en');
            $question->keywords_en      = Input::get('keywords_en');
            $question->remarque1        = Input::get('remarque1');
            $question->remarque2        = Input::get('remarque2');
            $question->user_id          = Sentry::getId();


            // Was the question created
            if ( $question->save() )
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
        if (is_null($question = Question::find($questionId)))
        {
            // Redirect to the questions management page
            return Redirect::to('admin/questions')->with('error', Lang::get('admin/questions/messages.does_not_exist'));
        }
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
        if (is_null($question = Question::find($questionId)))
        {
            // Redirect to the questions management page
            return Redirect::to('admin/questions')->with('error', Lang::get('admin/questions/messages.does_not_exist'));
        }

        // Declare the rules for the form validation
        $rules = array(
            'priority'   => 'required|integer',
            'category' => 'required',
            'question_fr' => 'required',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the question data
            $question->category_id      = Input::get('category');
            $question->category_id_2      = ( Input::get('category2') == 0 ) ? null : Input::get('category2');
            $question->category_id_3      = ( Input::get('category3') == 0 ) ? null : Input::get('category3');
            $question->priority         = Input::get('priority');
            $question->actif            = ( Input::get('actif') ) ? 1 : 0 ;
            $question->public           = ( Input::get('public') ) ? 1 : 0 ;
            $question->checked          = ( Input::get('checked') ) ? 1 : 0 ;
            $question->question_fr      = Input::get('question_fr');
            $question->reponse_fr       = Input::get('reponse_fr');
            $question->title_fr         = Input::get('title_fr');
            $question->keywords_fr      = Input::get('keywords_fr');
            $question->question_en      = Input::get('question_en');
            $question->reponse_en       = Input::get('reponse_en');
            $question->title_en         = Input::get('title_en');
            $question->keywords_en      = Input::get('keywords_en');
            $question->remarque1        = Input::get('remarque1');
            $question->remarque2        = Input::get('remarque2');

            // Was the question updated?
            if($question->save())
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
        if ( is_null( $question = Question::find($questionId) ) )
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
