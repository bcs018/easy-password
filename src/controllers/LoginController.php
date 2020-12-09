<?php
namespace src\controllers;

use \core\Controller;


class LoginController extends Controller {
    public function index(){
        $this->render('login');
    }

    public function validarLogin(){
        if($_POST['login'] == '' || $_POST['senha'] == '' || !isset($_POST['login']) || !isset($_POST['senha'])){
            //Erro 001 = Login ou Senha em branco
            echo json_encode(['erro'=>'001']);
            exit;
        }

        if($_POST['hash'] != $_SESSION['hash']){
            //Erro 002 = Formulario enviado atraves de outro aplicativo
            echo json_encode(['erro'=>'002']);
            exit;
        }

        $email = addslashes($_POST['login']);
        $senha = addslashes($_POST['senha']);
    }
}