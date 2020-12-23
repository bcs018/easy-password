<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Painel;


class PainelController extends Controller {
    public function index(){
        $painel = new Painel;
        $categorias['categorias'] = $painel->listaCate();

        $this->render('painel/cadCategoria', $categorias);
    }

    public function visualizarSenha(){
        $painel = new Painel();

        $this->render('painel/visSenha', ['senhas'=>$painel->listSenhas()]);
    }

    public function dadosCadastrais(){
        $this->render('painel/dadCadastral');
    }

    /*------------------------------------------------*/

   
} 