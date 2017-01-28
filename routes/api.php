<?php

Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function($api) {
    $api->post('password/reset', 'AuthController@password_reset');
});