<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    // so they are visiting a generic URL, we need to pick a language for them
    if (Request::segment(1) != 'en' AND Request::segment(1) != 'zh') {

        // Get language
        $lang = strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]);

        $append = '';
        if (Request::getQueryString() != '') {
            $append = '?' . Request::getQueryString();
        }

         $path = '/'.Request::path();

        if (substr($lang,0,5) == 'zh-tw' || substr($lang,0,5) == 'zh-hk') {
            return Redirect::to('zh'. $path . $append);
        } else {
             return Redirect::to('en'. $path . $append);
        }

    } else {

        // great, just set the locale
        if (Request::segment(1)=='zh')
            App::setLocale('zh');
        else
            App::setLocale('en'); // english is default

    }
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});