<?php
$routes = [
    '' => 'HomeController@index', 
    'about' => 'HomeController@about', 
    'cadastrar' => 'UserController@cadastrar',
    'login' => 'UserController@login',
    'logout' => 'UserController@logout',
    'amigos' => 'AmigosController@index',
    'comercios' => 'ComercioController@index',
    'configurações' => 'UserController@config',
    'updateuserconfig' => 'UserController@updateConfig',
    'updateamigo' => 'AmigosController@updateAmigo',
    'updatecomercio' => 'ComercioController@updateComercio',
    'deletaramigo' => 'AmigosController@deleteAmigo',
    'deletarcomercio' => 'ComercioController@deleteComercio'
];

return $routes;