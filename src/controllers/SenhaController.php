<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha; 
use \src\models\Cadastro; 

class SenhaController extends Controller {

    public function inserir(){
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

} 