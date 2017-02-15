<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

    Route::group(['prefix' => 'user', 'as' => 'users.'], function () {

        Route::get('/edit', ['as' => 'edit', 'uses' => 'UsersController@edit']);
        Route::put('/', ['as' => 'update', 'uses' => 'UsersController@update']);
        Route::delete('/', ['as' => 'destroy', 'uses' => 'UsersController@destroy']);
        Route::get('{slug}-{id}', ['as' => 'show', 'uses' => 'UsersController@show'])
            ->where('slug', '[A-Za-z\-\_]+')
            ->where('id', '[0-9]+');
    });
});

Route::group(['prefix' => 'static', 'as' => 'static.'], function () {
    Route::group(['prefix' => 'info', 'as' => 'info.'], function () {

        Route::get('/', ['as' => 'info', 'uses' => 'StaticController@info']);
        Route::get('/organize', ['as' => 'organize', 'uses' => 'StaticController@organize']);
        Route::get('/code-of-conduct', ['as' => 'code-of-conduct', 'uses' => 'StaticController@codeOfConduct']);

    });
});

Route::group(['as' => 'users.'], function () {
    Auth::routes();
});

Route::group(['as' => 'auth.'], function () {
    Route::get('auth/twitter', ['as' => 'twitter.redirect', 'uses' => 'Auth\Twitter@redirectToProvider']);
    Route::get('auth/twitter/callback', ['as' => 'twitter.callback', 'uses' => 'Auth\Twitter@handleProviderCallback']);
});
