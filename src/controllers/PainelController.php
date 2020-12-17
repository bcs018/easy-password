<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Painel;


class PainelController extends Controller {
    public function index(){
        $painel = new Painel;
        $categorias['categorias'] = $painel->listaCate();

        $this->render('painel/cadCategoria', $categorias);
    }

    public function visualizarSenha(){
        $this->render('painel/visSenha');
    }

    public function dadosCadastrais(){

        $this->render('painel/dadCadastral');
    }

    public function inserirCat(){
        if(!isset($_POST['nomeCat']) || empty($_POST['nomeCat'])){
            $_SESSION['message'] = "<script>
                                        toastr.error('Nome da categoria em branco!');
                                    </script>";

            header("Location: ". BASE_URI."/painel");
            exit;
        }

        $categoria = htmlspecialchars(addslashes($_POST['nomeCat']));

        $painel = new Painel;
        $painel->inserirCate($categoria);

        $_SESSION['message'] = "<script>
                                    toastr.success('Cadastro feito com sucesso!');
                                </script>";

        header("Location: ". BASE_URI."/painel");
        exit;   
    }

    public function excluirCat($id){
        $painel = new Painel;
        $painel->excluirCate($id['id']);

        $_SESSION['message'] = "<script>
                                    toastr.success('Excluido com sucesso!');
                                </script>";

        header("Location: ". BASE_URI."/painel");
        exit;
    }
    
    public function consultarItemCat($id){
        $painel = new Painel;
        $dados = $painel->consultarCate($id['id']);

        $categoria = [
                      'nomeCategoria' => $dados['nome_categoria'], 
                      'id'            => $dados['categoria_id']
                     ];
        
        echo json_encode($categoria);
        exit;
    }

    public function editarCat($id){
        $painel = new Painel;
        $painel->editarCate($id['id'], $_POST['nome']);

        echo json_encode(true);
        exit;
    }

    public function editarNick(){
        $painel = new Painel;
        $painel->editNick(addslashes($_POST['nick']), $_POST['id']);
        $_SESSION['log']['nick'] = addslashes($_POST['nick']);
        echo json_encode(true);
        exit;
    }

    /* Colocar regra: Senha deve conter mais que 6 carac */
    public function editarSenha(){
        $painel = new Painel;
        $painel->editSenha(addslashes($_POST['nick']), $_POST['id']);
        $_SESSION['log']['nick'] = addslashes($_POST['nick']);
        echo json_encode(true);
        exit;
    }
}