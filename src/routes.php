<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sobre/{nome}', 'HomeController@sobreP');
$router->get('/sobre', 'HomeController@sobre');

$router->get('/login', 'LoginController@index');
$router->get('/cadastre-se', 'CadastroController@index');

/* Rotas de requisições ajax */
$router->post('/cadastre-se/valida-login', 'CadastroController@validarLogin');
$router->post('/cadastre-se/cadastrar', 'CadastroController@cadastrar');
$router->post('/gerar-senha', 'HomeController@geraSenha');
