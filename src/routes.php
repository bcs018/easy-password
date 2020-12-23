<?php
use core\Router;

$router = new Router();

/* Home */
$router->get('/', 'HomeController@index');
$router->post('/gerar-senha', 'HomeController@geraSenha');

/* Painel */
$router->get('/painel', 'PainelController@index');
$router->get('/painel/visualizar-senha', 'PainelController@visualizarSenha');
$router->get('/painel/dados-cadastrais', 'PainelController@dadosCadastrais');

/* Login */
$router->get('/login', 'LoginController@index');
$router->get('/sair', 'LoginController@sair');
$router->post('/logar', 'LoginController@validarLogin');

/* Categoria */
$router->post('/painel/inserir-categoria', 'CategoriaController@inserir');
$router->get('/painel/excluir-categoria/{id}', 'CategoriaController@excluir');
$router->post('/painel/consultar-categoria/{id}', 'CategoriaController@consultar');
$router->post('/painel/editar-categoria/{id}', 'CategoriaController@editar');

/* Cadastro */
$router->post('/cadastre-se/valida-login', 'CadastroController@validarLogin');
$router->post('/painel/alterar-nick/{id}', 'CadastroController@editarNick');
$router->post('/painel/alterar-senha/{id}', 'CadastroController@editarSenha');
$router->post('/cadastre-se/cadastrar', 'CadastroController@inserir');
$router->get('/cadastre-se', 'CadastroController@index');

/* Senha */
$router->post('/painel/consultar-senha/{idsen}/{idcat}', 'SenhaController@consultar');
$router->post('/salvar-senha', 'SenhaController@inserir');
$router->get('/painel/excluir-senha/{id}/{cat}', 'SenhaController@excluir');




