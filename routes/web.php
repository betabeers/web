<?php

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'user', 'as' => 'users.'], function () {

    Route::get('/edit', ['as' => 'edit', 'uses' => 'UsersController@edit']);
    Route::put('/', ['as' => 'update', 'uses' => 'UsersController@update']);
    Route::delete('/', ['as' => 'destroy', 'uses' => 'UsersController@destroy']);
    Route::get('{slug}-{id}', ['as' => 'show', 'uses' => 'UsersController@show'])
        ->where('slug', '[A-Za-z\-\_]+')
        ->where('id', '[0-9]+');
});

Auth::routes();

