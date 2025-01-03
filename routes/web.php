<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\ExampleController;

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
    return 'API Example Lumen Framework version ' . $router->app->version() . '!';
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/example', 'ExampleController@index');
    $router->post('/example', 'ExampleController@store');
    $router->put('/example/{id}', 'ExampleController@update');
    $router->delete('/example/{id}', 'ExampleController@destroy');
});
