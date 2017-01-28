<?php

Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1', 'as' => 'api.v1.'], function($api) {
    $api->post('password/reset', ['as' => 'password_reset', 'uses' => 'AuthController@password_reset']);
});