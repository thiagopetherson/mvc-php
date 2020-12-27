<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/novo', 'UsuarioController@add'); //Adicionar novo usuário (view)
$router->post('/novo', 'UsuarioController@addAction'); //Adicionar novo usuário (submit)

$router->get('/usuario/{id}/editar', 'UsuarioController@edit'); //Renderizar a views de editar usuário
$router->post('/usuario/{id}/editar', 'UsuarioController@editAction'); //Editar usuário (submit)

$router->get('/usuario/{id}/excluir', 'UsuarioController@del'); //Remover usuário