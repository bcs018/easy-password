<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha; 

class SenhaController extends Controller {

    public function inserirSenha(){
        $senha      = htmlspecialchars(addslashes($_POST['senha']));
        $alterou    = $_POST['alterou'];
        $categoria  = $_POST['categoria'];

        if(empty($senha)){
            echo json_encode(['error'=>'001']);
            exit;
        }

        $senha = new Senha();

        $senha->inserirSen($senha, $alterou, $categoria);

    }

}