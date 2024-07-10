<?php

// Definir as rotas
$routes = [
    '' => 'HomeController@index', 
    'about' => 'HomeController@about', 
    'cadastrar' => 'UserController@cadastrar',
    'login' => 'UserController@login',
    'logout' => 'UserController@logout',
    'amigos' => 'AmigosController@index',
    'comercios' => 'ComercioController@index',
    'configurações' => 'UserController@config',
    'updateuserconfig' => 'UserController@updateConfig'
];

return $routes;