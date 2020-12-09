<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Cadastro;


class CadastroController extends Controller {
    public function index(){
        $this->render('cadastrese');
    }

    public function validarLogin(){
        $cadastro = new Cadastro();
               
        echo json_encode( ['exists'=>$cadastro->verLogin($_POST['login'])] );
        return true;
    }

    public function cadastrar(){
        if(!isset($_POST['login']) || !isset($_POST['senha']) || $_POST['login'] == ''){
            //Erro 001 = Login ou Senha não vieram no formulario
            echo json_encode(['erro'=>'001']);
            exit;
        }

        $cadastro = new Cadastro();
       
        if($cadastro->inserir($_POST) == 1){
            //Erro 002 = Já existe usuario cadastrado com esse login
            echo json_encode(['erro'=>'002']);
            exit;
        }

        //Mensagem 100 = Cadastro efetuado com sucesso
        echo json_encode(['success'=>'100']);
        exit;
    }
}