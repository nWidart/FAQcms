<?php
Route::get('/', function()
{
	return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
*/

Route::group( array( 'prefix' => 'account' ), function()
{
    # Login
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    # Logout
    Route::get('logout', 'AuthController@getLogout');
});

// The dashboard
Route::group(array('prefix' => 'admin', 'before' => 'admin-auth'), function()
{
    Route::get('/', 'AdminDashboardController@getIndex');
});

// The questions
Route::group(array('prefix' => 'admin/questions', 'before' => 'admin-auth'), function()
{
    Route::get('/', 'AdminQuestionsController@getIndex');
    Route::post('/', 'AdminQuestionsController@postIndex');
    Route::get('/create', 'AdminQuestionsController@getCreate');
    Route::post('/create', 'AdminQuestionsController@postCreate');
    Route::get('/{questionId}/edit', 'AdminQuestionsController@getEdit');
    Route::post('/{questionId}/edit', 'AdminQuestionsController@postEdit');
    Route::get('/{questionId}/delete', 'AdminQuestionsController@getDelete');
});

// The categories
Route::group(array('prefix' => 'admin/categories', 'before' => 'admin-auth'), function()
{
    Route::get('/', 'AdminCategoriesController@getIndex');
    Route::get('/create', 'AdminCategoriesController@getCreate');
    Route::post('/create', 'AdminCategoriesController@postCreate');
    Route::get('/{categoryId}/edit', 'AdminCategoriesController@getEdit');
    Route::post('/{categoryId}/edit', 'AdminCategoriesController@postEdit');
    Route::get('/{categoryId}/delete', 'AdminCategoriesController@getDelete');
});

// User Management
Route::group(array('prefix' => 'admin/users', 'before' => 'admin-auth'), function()
{
    Route::get('/', 'AdminUsersController@getIndex');
    Route::get('/create', 'AdminUsersController@getCreate');
    Route::post('/create', 'AdminUsersController@postCreate');
    Route::get('/{userId}/edit', 'AdminUsersController@getEdit');
    Route::post('/{userId}/edit', 'AdminUsersController@postEdit');
    Route::get('/{userId}/delete', 'AdminUsersController@getDelete');
});

// Group Management
Route::group(array('prefix' => 'admin/groups', 'before' => 'admin-auth'), function()
{
    Route::get('/', 'AdminGroupsController@getIndex');
    Route::get('/create', 'AdminGroupsController@getCreate');
    Route::post('/create', 'AdminGroupsController@postCreate');
    Route::get('/{groupId}/edit', 'AdminGroupsController@getEdit');
    Route::post('/{groupId}/edit', 'AdminGroupsController@postEdit');
    Route::get('/{groupId}/delete', 'AdminGroupsController@getDelete');
});
