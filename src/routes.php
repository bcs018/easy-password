<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sobre/{nome}', 'HomeController@sobreP');
$router->get('/sobre', 'HomeController@sobre');

$router->get('/login', 'LoginController@index');
$router->get('/sair', 'LoginController@sair');

$router->get('/cadastre-se', 'CadastroController@index');

$router->get('/painel', 'PainelController@index');
$router->get('/painel/visualizar-senha', 'PainelController@visualizarSenha');
$router->get('/painel/dados-cadastrais', 'PainelController@dadosCadastrais');
$router->post('/painel/alterar-nick/{id}', 'PainelController@editarNick');
$router->post('/painel/alterar-senha/{id}', 'PainelController@editarSenha');
$router->post('/inserir-categoria', 'PainelController@inserirCat');
$router->get('/excluir-categoria/{id}', 'PainelController@excluirCat');
$router->post('/consultar-categoria/{id}', 'PainelController@consultarItemCat');
$router->post('/editar-categoria/{id}', 'PainelController@editarCat');
$router->get('/painel/excluir-senha/{id}/{cat}', 'PainelController@excluirSenha');


$router->post('/salvar-senha', 'SenhaController@salvarSenha');

/* Rotas de requisições ajax */
$router->post('/cadastre-se/valida-login', 'CadastroController@validarLogin');
$router->post('/cadastre-se/cadastrar', 'CadastroController@cadastrar');
$router->post('/gerar-senha', 'HomeController@geraSenha');
$router->post('/logar', 'LoginController@validarLogin');
