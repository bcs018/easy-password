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

    public function inserir(){
        if(!isset($_POST['login']) || !isset($_POST['senha']) || $_POST['login'] == ''){
            //Erro 001 = Login ou Senha não vieram no formulario
            echo json_encode(['erro'=>'001']);
            exit;
        }

        if($_POST['hash'] != $_SESSION['hash']){
            //Erro 002 = Formulario enviado atraves de outro aplicativo
            echo json_encode(['erro'=>'003']);
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

    public function editarNick($id){
        if($this->verHash($_POST['hash'])){
            echo json_encode(['error'=>'001']);
            exit;
        }

        $cadastro = new Cadastro;
        $cadastro->editNick(addslashes($_POST['nick']), $id['id']);
        $_SESSION['log']['nick'] = addslashes($_POST['nick']);
        echo json_encode(true);
        exit;
    }

    public function editarSenha($id){
        if($this->verHash($_POST['hash'])){
            echo json_encode(['error'=>'003']);
            exit;
        }
        
        $cadastro = new Cadastro;

        if(strlen($_POST['senha']) < 6){
            // Erro 001 = Senha menor que 6 caracteres
            echo json_encode(['error'=>'001']);
            exit;
        }

        if(addslashes($_POST['senha']) != addslashes($_POST['senhaRep'])){
            // Erro 002 = Senhas diferentes
            echo json_encode(['error'=>'002']);
            exit;
        }

        $cadastro->editSenha(addslashes($_POST['senha']), $id['id']);
        echo json_encode(true);
        exit;
    }

    private function verHash($hash){
        if($hash != $_SESSION['hash']) {
            $_SESSION['message'] = "<script>
                                        toastr.error('Houve um erro no envio, informe o erro 002 para o admin do sistema ou tente novamente recarregando a pagina!');
                                    </script>";
            return true;
        }

        return false;
    }


}