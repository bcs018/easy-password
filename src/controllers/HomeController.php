<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Test;

class HomeController extends Controller {

    public function index() {
        $test = new Test();
        //$usu = $test->getAll();
        $this->render('home');
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function geraSenha() {
        if(!isset($_POST['qtd_carac'])){
            echo json_encode(array("erro"=>"Quantidade de caracter zerado!"));
            exit;
        }

        
        //$frase['senha'] = $_POST['nome_ref'].'<br>'.$_POST['qtd_carac'].'<br>'.$_POST['carac_espec'].'<br>'.$_POST['letra_mai_min'].'<br>'.$_POST['salvar'];

        $frase['senha'] = rand(0, 1000);
        echo json_encode($frase);
    }

}