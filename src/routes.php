<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sobre/{nome}', 'HomeController@sobreP');
$router->get('/sobre', 'HomeController@sobre');

$router->get('/gerar-senha', 'HomeController@gerarSenha');
$router->get('/login', 'LoginController@index');
$router->get('/cadastre-se', 'CadastroController@index');