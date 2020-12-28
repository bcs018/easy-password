<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Painel;


class PainelController extends Controller {
    public function index(){
        $painel = new Painel;

        $this->render('painel/cadCategoria', ['categorias' => $painel->listaCate()]);
    }

    public function visualizarSenha(){
        $painel = new Painel();

        $this->render('painel/visSenha', [
                                            'senhas'     =>$painel->listSenhas(),
                                            'categorias' => $painel->listaCate()
                                         ]);
    }

    public function dadosCadastrais(){
        $this->render('painel/dadCadastral');
    }

    /*------------------------------------------------*/

} 