<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha; 
use \src\models\Cadastro; 

class SenhaController extends Controller {

    public function inserir(){
        $categorias = $_POST['categoria'];
        $senhaGravar = htmlspecialchars(addslashes($_POST['senhaSalvar']));
        $senhaComparar =  htmlspecialchars(addslashes($_POST['senhaComparar']));
        $alterado = 0;

        if($senhaGravar != $senhaComparar){
            $alterado = 1;
        }

        $s = new Senha();

        $s->inserirSen($senhaGravar, $alterado, $categorias);
        
        header("Location: ". BASE_URI);
    }

    public function excluir($id){
        $senha = new Senha;

        if($senha->excluirSen($id['id'], $id['cat'])){
            $_SESSION['message'] = "<script> 
                                        toastr.error('Está senha não pertence a esse usuário!');
                                    </script>";          
            header("Location: ".BASE_URI."/painel/visualizar-senha"); 
            exit;                       
        }

        $_SESSION['message'] = "<script> 
                                    toastr.success('Senha excluido com sucesso!');
                                </script>";          
        header("Location: ".BASE_URI."/painel/visualizar-senha"); 
        exit;
    }

    public function consultar($id){
        $senha = new Senha();

        $dados = $senha->consultarSen($id['idsen'], $id['idcat']);
        //echo "<pre>";
        //print_r($dados);
        //echo "</pre>";exit;
        if($dados == 1){
            $_SESSION['message'] = "<script> 
                                        toastr.error('Está senha não pertence a esse usuário!');
                                    </script>";
            header("Location: ".BASE_URI."/painel/visualizar-senha"); 
            exit;
        }

        echo json_encode($dados);
        exit;
    }

    public function editar(){
        if($this->verHash($_POST['hash3'])){
            header("Location: ".BASE_URI.'/painel/visualizar-senha');
            exit;
        } 

        if(empty($_POST['senhaN'])){
            $_SESSION['message'] = "<script> 
                                        toastr.error('Senha em branco, altere novamente!');
                                    </script>";
            header("Location: ".BASE_URI."/painel/visualizar-senha"); 
            exit;
        }

        $senha = htmlspecialchars(addslashes($_POST['senhaN']));
        if(empty($_POST['categoria'])){ $_POST['categoria'] = [1];}
        $categorias = $_POST['categoria'];
        $idSenha = htmlspecialchars(addslashes($_POST['senid']));
        $idCat = htmlspecialchars(addslashes($_POST['catid']));

        $s = new Senha();

        $dados = $s->editarSen($categorias, $senha, $idSenha, $idCat);

        if($dados == 1){
            $_SESSION['message'] = "<script> 
                                        toastr.error('Está senha não pertence a esse usuário!');
                                    </script>";
            header("Location: ".BASE_URI."/painel/visualizar-senha"); 
            exit;
        }

        $_SESSION['message'] = '<script> toastr.success("Senha alterada com sucesso!"); </script>';
        header("Location: ".BASE_URI."/painel/visualizar-senha"); 
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