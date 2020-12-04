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
            echo json_encode(array("erro"=>"Quantidade de caracter zerado!"));
            exit;
        }

        $s = new Senha($_POST);
        $senha = ['senha' => implode('', $s->gerarSenha())];

        echo json_encode($senha);
    }
}