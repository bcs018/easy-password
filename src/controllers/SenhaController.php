<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha; 
use \src\models\Cadastro; 

class SenhaController extends Controller {

    public function salvarSenha(){
        $categorias = $_POST['categoria'];
        $senhaGravar = addslashes($_POST['senhaSalvar']);
        $senhaComparar =  addslashes($_POST['senhaComparar']);
        $alterado = 0;

        if($senhaGravar != $senhaComparar){
            $alterado = 1;
        }

        $s = new Senha();

        $s->inserirSen($senhaGravar, $alterado, $categorias);
        
        header("Location: ". BASE_URI);
    }

}