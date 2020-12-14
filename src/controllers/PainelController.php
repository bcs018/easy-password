<?php
namespace src\controllers;

use \core\Controller;
//use \src\models\Login;


class PainelController extends Controller {
    public function index(){
        $this->render('painel/cadSenha');
    }
}