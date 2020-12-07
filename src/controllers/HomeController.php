<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha; 

class HomeController extends Controller {

    public function index() {
        $this->render('home');
    }

    public function geraSenha() {
        if(!isset($_POST['qtd_carac'])){
            //Erro 001 = Qtd caracter zerado
            echo json_encode(array("erro"=>"001"));
            exit;
        }

        if(!isset($_POST['carac_espec']) && !isset($_POST['letra_mai']) && !isset($_POST['letra_min']) && !isset($_POST['numero'])){
            //Erro 002 = Nenhuma opção selecionada
            echo json_encode(array("erro"=>"002"));
            exit;
        }

        $s = new Senha($_POST);
        $senha = ['senha' => implode('', $s->gerarSenha())];

        echo json_encode($senha);
    }
}