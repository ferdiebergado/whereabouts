<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json([
        'message' => 'OK',
        'data' => [
            'api_version' => '1.1.0',
            'framework_version' => $router->app->version(),
        ]
    ]);
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
});

$router->group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () use ($router) {
    $router->get('/whereabouts', 'WhereaboutController@index');
    $router->get('/whereabouts/{id}', 'WhereaboutController@show');
    $router->post('/whereabouts', 'WhereaboutController@store');
    $router->put('/whereabouts/{id}', 'WhereaboutController@update');
    $router->delete('/whereabouts/{id}', 'WhereaboutController@destroy');
});
