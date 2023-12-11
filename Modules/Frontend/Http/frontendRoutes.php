<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->get('/', [
    'as' => 'home',
    'uses' => 'FrontendController@homepage'
]);

$router->get('/home', [
    'as' => 'homepage',
    'uses' => 'FrontendController@homepage'
]);

$router->get('/staff-list', [
    'as' => 'stafflist',
    'uses' => 'FrontendController@stafflist'
]);

$router->get('/staff-list/{id}/detail', [
    'as' => 'staffDetail',
    'uses' => 'FrontendController@staffDetail'
]);

$router->get('/department', [
    'as' => 'department',
    'uses' => 'FrontendController@department'
]);
