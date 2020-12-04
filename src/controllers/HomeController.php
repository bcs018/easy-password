<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Senha;

class HomeController extends Controller {

    public function index() {
        $this->render('home');
    }

    public function geraSenha() {
        if(!isset($_POST['qtd_carac'])){
            echo json_encode(array("erro"=>"Quantidade de caracter zerado!"));
            exit;
        }

        $s = new Senha($_POST);

        $senha = $s->gerarSenha();

        echo '<pre>';
        print_r($senha);
        echo '</pre>';        
        exit;
        

        
        
        print_r($_POST);
      
        $frase['senha'] = rand(0, 1000);
        echo json_encode($frase);
    }

    private function todasOp($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //10 numeros
            //13 especiais

            $ind = rand(0,3);

            switch ($ind) {
                case 0:
                    $indCarac = rand(0,9);
                    $senha[] = $this->caracteres[$ind][$indCarac];
                    break;
                
                case 3: 
                    $indCarac = rand(0,12);
                    $senha[] = $this->caracteres[$ind][$indCarac];
                    break;

                default:
                    $indCarac = rand(0,26);
                    $senha[] = $this->caracteres[$ind][$indCarac];
                    break;
            }
        }

        return $senha;
    }

}