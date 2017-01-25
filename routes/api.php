<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1'], function($api) {
    $api->post('password/reset', 'AuthController@password_reset');
});