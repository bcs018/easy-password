<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Test;

class HomeController extends Controller {

    public function index() {
        $test = new Test();
        //$usu = $test->getAll();
        $this->render('home');
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function geraSenha() {
        if(!isset($_POST['qtd_carac'])){
            echo json_encode(array("erro"=>"Quantidade de caracter zerado!"));
            exit;
        }

        $senha = [];
        
        $caracNumero = [1,2,3,4,5,6,7,8,9,0];
        $caracLetMin = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','ç'];
        $caracLetMai = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','Ç'];
        $caracEspeci = ['!','@','#','$','%','&','*','/','?','+','-'];
        $qtdCaracter = $_POST['qtd_carac'];

        if(!isset($_POST['nome_ref']) || $_POST['nome_ref'] != ''){
            $nomeRefecen = str_split($_POST['nome_ref']);

            if(isset($_POST['carac_espec']) && isset($_POST['letra_mai']) && isset($_POST['letra_min']) && isset($_POST['numero'])){
                
            }

            for($i = 0; $i < $_POST['qtd_carac']; $i++){
                //27 alfabeto
                //10 numeros
                //11 especiais
                if(isset($_POST['carac_espec']) && isset($_POST['letra_mai_min'])){

                }
                
            }
        }

        
        //echo $_POST['carac_espec'];exit;

        print_r($_POST['carac_espec']);exit;

        

        //$frase['senha'] = $_POST['nome_ref'].'<br>'.$_POST['qtd_carac'].'<br>'.$_POST['carac_espec'].'<br>'.$_POST['letra_mai_min'].'<br>'.$_POST['salvar'];

        $frase['senha'] = rand(0, 1000);
        echo json_encode($frase);
    }

    private function gerarLetras(){

    }
    
    private function gerarNumero(){
        
    }
    
    private function gerarCaraEspecial(){
        
    }
}