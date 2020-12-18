<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha; 
use \src\models\Painel; 

class HomeController extends Controller {

    public function index() {
        if(isset($_SESSION['log'])){
            $painel = new Painel;
            $this->render('home', ['categorias'=>$painel->listaCate()]);
            exit;
        }
                
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

        $s = new Senha();
        $senha = ['senha' => implode('', $s->gerarSenha($_POST))];

        echo json_encode($senha);
    }
}