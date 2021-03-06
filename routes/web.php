<?php

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'user', 'as' => 'users.'], function () {

    Route::get('/edit', ['as' => 'edit', 'uses' => 'UsersController@edit']);
    Route::put('/', ['as' => 'update', 'uses' => 'UsersController@update']);
    Route::delete('/', ['as' => 'destroy', 'uses' => 'UsersController@destroy']);
    Route::get('{slug}-{id}', ['as' => 'show', 'uses' => 'UsersController@show'])
        ->where('slug', '[A-Za-z\-\_]+')
        ->where('id', '[0-9]+');

    /**
     * Auth routes
     */
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
        Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
        Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
        Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);
        Route::get('password/reset', ['as' => 'password.email.form', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
        Route::post('password/email', ['as' => 'password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
        Route::get('password/reset/{token}', ['as' => 'password.reset.form', 'uses' => 'ResetPasswordController@showResetForm']);
        Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'ResetPasswordController@reset']);
    });
});

