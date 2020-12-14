<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Painel;


class PainelController extends Controller {
    public function index(){
        $painel = new Painel;

        $this->render('painel/cadCategoria', $painel->listaCate());
    }

    public function inserirCat(){
        if(!isset($_POST['nomeCat']) || empty($_POST['nomeCat'])){
            $_SESSION['message'] = '001';
            exit;
        }

        $categoria = htmlspecialchars(addslashes($_POST['nomeCat']));

        $painel = new Painel;

        $painel->inserirCate($categoria);

        $_SESSION['message'] = '002';                
    }
}