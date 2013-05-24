<?php

class AuthController extends BaseController {

    public function getIndex()
    {
        if ( !Sentry::check() )
        {
            return Redirect::to('account/login');
        }
        // Show the page
        return View::make('account/index');
    }

    /**
     * Account login.
     *
     * @return View
     */
    public function getLogin()
    {
        // Are we logged in?
        if (Sentry::check())
        {
            return Redirect::to('account');
        }

        // Show the page
        return View::make('account/login');
    }

    /**
     * Account login form processing.
     *
     * @return Redirect
     */
    public function postLogin()
    {
        // Declare the rules for the form validation
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            try
            {
                // Try to log the user in
                if (Sentry::authenticate(Input::only('email', 'password'), Input::get('remember-me', 0)))
                {
                    // Get the page we were before
                    $redirect = Session::get('loginRedirect', 'account');

                    // Unset the page we were before from the session
                    Session::forget('loginRedirect');

                    // Redirect to the users page
                    return Redirect::to('admin')->with('success', Lang::get('account/auth.messages.login.success'));
                }

                // Redirect to the login page
                return Redirect::to('account/login')->with('error', Lang::get('account/auth.messages.login.error'));
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $error = 'account_not_found';
            }
            catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                $error = 'account_not_activated';
            }
            catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
            {
                $error = 'account_suspended';
            }
            catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
            {
                $error = 'account_banned';
            }

            // Redirect to the login page
            return Redirect::to('account/login')->with('error', Lang::get('account/auth.' . $error));
        }

        // Something went wrong
        return Redirect::to('account/login')->withInput()->withErrors($validator);
    }
    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        // Log the user out
        Sentry::logout();

        // Redirect to the users page
        return Redirect::to('/')->with('success', 'You have successfully logged out!');
    }
}
