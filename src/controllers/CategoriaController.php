<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Categoria;

class CategoriaController extends Controller {

    public function inserir(){
        if(!isset($_POST['nomeCat']) || empty($_POST['nomeCat'])){
            $_SESSION['message'] = "<script>
                                        toastr.error('Nome da categoria em branco!');
                                    </script>";

            header("Location: ". BASE_URI."/painel");
            exit;
        }

        if($this->verHash($_POST['hash'])){
            header("Location: ". BASE_URI."/painel");
            exit;
        }

        $categoria = htmlspecialchars(addslashes($_POST['nomeCat']));

        $cat = new Categoria;
        $cat->inserirCate($categoria);

        $_SESSION['message'] = "<script>
                                    toastr.success('Cadastro feito com sucesso!');
                                </script>";

        header("Location: ". BASE_URI."/painel");
        exit;   
    }

    public function excluir($id){ 
        if($id['id'] == 1){
            $_SESSION['message'] = '<script> 
                                        toastr.error("Não pode excluir essa categoria!"); 
                                    </script>';
            header("Location: ". BASE_URI."/painel");
            exit;
        }

        $cat = new Categoria;

        $dados = $cat->excluirCate($id['id']);

        if($dados == 1){
            $_SESSION['message'] = '<script> 
                                        toastr.error("Não pode excluir a categoria pois tem uma senha vinculada a ela!"); 
                                    </script>';
            header("Location: ". BASE_URI."/painel");
            exit;
        }elseif($dados == 2){
            $_SESSION['message'] = '<script> 
                                        toastr.error("Houve um erro no envio, informe o erro 002 para o admin do sistema ou tente novamente recarregando a pagina!"); 
                                    </script>';
            header("Location: ". BASE_URI."/painel");
            exit;
        }

        $_SESSION['message'] = "<script>
                                    toastr.success('Excluido com sucesso!');
                                </script>";

        header("Location: ". BASE_URI."/painel");
        exit;
    }
    
    public function consultar($id){
        if($id['id'] == 1){
            //Erro 001 = Não pode excluir a categoria 1 - Sem categoria
            echo json_encode(['error'=>'001']);
            exit;
        }

        $cat = new Categoria;
        $dados = $cat->consultarCate($id['id']);

        $categoria = [
                      'nomeCategoria' => $dados['nome_categoria'], 
                      'id'            => $dados['categoria_id']
                     ];
        
        echo json_encode($categoria);
        exit;
    }

    public function editar($id){
        if($this->verHash($_POST['hash'])){
            //Desfazendo a sessão porque a mensagem está sendo exibida no ajax editarCat.js erro = 001
            unset($_SESSION['message']);
            echo json_encode(['error'=>'001']);
            exit;
        }

        $cat = new Categoria;
        //Caso não tenha feito o update
        if($cat->editarCate($id['id'], $_POST['nome']) == 2){
            echo json_encode(['error'=>'002']);
            exit;
        }

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