<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Login;


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

        $login = new Login();

        if($login->validarAutentic($email, $senha)){
            //Mensagem 100 = Autenticação validada
            echo json_encode(['success'=>'100']);
            exit;
        }

        //Autenticação inválida
        echo json_encode(['succes'=>'000']);
    }
}