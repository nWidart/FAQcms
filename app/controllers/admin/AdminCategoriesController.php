<?php

class AdminCategoriesController extends AdminController {

    /**
     * Show a list of all the categories
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the categories
        $categories = Category::orderBy('name', 'DESC')->paginate(20);

        // Show the page
        return View::make( 'admin/categories/index', compact('categories') );
    }

    /**
     * Category create.
     *
     * @return View
     */
    public function getCreate()
    {
        // Show the page
        return View::make('admin/categories/create');
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
            'name'   => 'required',
        );
        // Validate the inputs
        $validator = Validator::make( Input::all(), $rules );
        if ($validator->passes() )
        {
            // Create new category
            $category = new Category;

            // The data
            $category->name = Input::get('name');

            // Was the category created
            if ( $category->save() )
            {
                // Redirect to the new blog post page
                return Redirect::to('admin/categories/' . $category->id . '/edit')->with('success', Lang::get('admin/categories/messages.create.success'));
            }

            // Redirect to the blog post create page
            return Redirect::to('admin/categories/create')->with('error', Lang::get('admin/categories/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/categories/create')->withInput()->withErrors($validator);
    }

    /**
     * Category update.
     *
     * @param  int  $categoryId
     * @return View
     */
    public function getEdit($categoryId = null)
    {
        // Check if the category exists
        if (is_null($category = Category::find($categoryId)))
        {
            // Redirect to the categories management page
            return Redirect::to('admin/categories')->with('error', Lang::get('admin/categories/messages.does_not_exist'));
        }
        // Show the page
        return View::make('admin/categories/edit', compact('category'));
    }

    /**
     * Category update form processing page.
     *
     * @param  int  $categoryId
     * @return Redirect
     */
    public function postEdit($categoryId = null)
    {
        // Check if the category exists
        if (is_null($category = Category::find($categoryId)))
        {
            // Redirect to the categories management page
            return Redirect::to('admin/categories')->with('error', Lang::get('admin/categories/messages.does_not_exist'));
        }

        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the category data
            $category->name = Input::get('name');

            // Was the category updated?
            if($category->save())
            {
                // Redirect to the new category page
                return Redirect::to('admin/categories/' . $categoryId . '/edit')->with('success', Lang::get('admin/categories/messages.update.success'));
            }

            // Redirect to the categories management page
            return Redirect::to('admin/categories/' . $categoryId . '/edit')->with('error', Lang::get('admin/categories/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/categories/' . $categoryId . '/edit')->withInput()->withErrors($validator);
    }

    /**
     * Delete the given Category.
     *
     * @param  int  $categoryId
     * @return Redirect
     */
    public function getDelete($categoryId)
    {
        // Check if the blog category exists
        if ( is_null( $category = Category::find($categoryId) ) )
        {
            // Redirect to the categories management page
            return Redirect::to('admin/categories')->with('error', Lang::get('admin/categories/messages.not_found'));
        }

        // Was the categoy deleted?
        if( $category->delete() )
        {
            // Redirect to the categories management page
            return Redirect::to('admin/categories')->with('success', Lang::get('admin/categories/messages.delete.success'));
        }

        // There was a problem deleting the question
        return Redirect::to('admin/categories')->with('error', Lang::get('admin/categories/messages.delete.error'));
    }
}
