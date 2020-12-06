<?php
namespace src\models;
use \core\Model;

class Senha extends Model {

    private $post;
    private $caracteres = [
        [1,2,3,4,5,6,7,8,9,0],
        ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','ç'],
        ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','Ç'],
        ['!','@','#','$','%','&','*','/','?','+','-', '<', '>', ]
      ];

    public function __construct($post){
        $this->post = $post;
    }

    public function gerarSenha(){
        /* Se as opções caracter especiais, letra maiuscula, letra minuscula, e numeros estiver marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai']) && isset($this->post['letra_min']) && isset($this->post['numero'])){   
            $senha = $this->todasOp($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opções letra maiuscula, letra minuscula, e numeros estiver marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['letra_min']) && isset($this->post['numero'])){
            $senha = $this->maiMinNum($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opções letra minuscula e numeros estiver marcadas */
        if(isset($this->post['letra_min']) && isset($this->post['numero'])){
            $senha = $this->minNum($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opções caracter especiais, letra maiuscula, letra minuscula marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai']) && isset($this->post['letra_min'])){   
            $senha = $this->espMaiMin($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opções caracter especiais, letra maiuscula marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai'])){   
            $senha = $this->espMai($this->post['qtd_carac']);
            return $senha;
        }

         /* Se as opções caracter especiais, letra minuscula marcadas */
         if(isset($this->post['carac_espec']) && isset($this->post['letra_min'])){   
            $senha = $this->espMin($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opções caracter especiais, numero marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['numero'])){   
            $senha = $this->espNum($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opções caracter maiusculo e especiais marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['carac_espec'])){   
            $senha = $this->maiEsp($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opção maiusculo e minusculo estiver marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['letra_min'])){  
            $senha = $this->maiMin($this->post['qtd_carac']);
            return $senha;
         }

          /* Se as opção maiusculo e minusculo estiver marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['numero'])){  
            $senha = $this->maiNum($this->post['qtd_carac']);
            return $senha;
         }

        /**
         * opções sozinhos
         */

        /* Se as opção numeros estiver marcadas */
        if(isset($this->post['numero'])){
            $senha = $this->numero($this->post['qtd_carac']);
            return $senha;
        }

        /* Se as opção minuscula estiver marcadas */
        if(isset($this->post['letra_min'])){
            $senha = $this->minuscula($this->post['qtd_carac']);
            return $senha;
        }
        
        /* Se as opção maiuscula estiver marcadas */
        if(isset($this->post['letra_mai'])){
            $senha = $this->maiuscula($this->post['qtd_carac']);
            return $senha;
        }

         /* Se as opção especial estiver marcadas */
         if(isset($this->post['carac_espec'])){
            $senha = $this->especial($this->post['qtd_carac']);
            return $senha;
         }
        
         
    }

    /* ---- Opções ---- */

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

    private function maiMinNum($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //10 numeros

            $ind = rand(0,2);

            switch ($ind) {
                case 0:
                    $indCarac = rand(0,9);
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

    private function minNum($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //10 numeros

            $ind = rand(0,1);

            switch ($ind) {
                case 0:
                    $indCarac = rand(0,9);
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

    private function numero($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //10 numeros
    
            $indCarac = rand(0,9);
            $senha[] = $this->caracteres[0][$indCarac];               
        }

        return $senha;
    }

    private function minuscula($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
    
            $indCarac = rand(0,26);
            $senha[] = $this->caracteres[1][$indCarac];               
        }

        return $senha;
    }

    private function maiuscula($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
    
            $indCarac = rand(0,26);
            $senha[] = $this->caracteres[2][$indCarac];               
        }

        return $senha;
    }

    private function especial($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
    
            $indCarac = rand(0,12);
            $senha[] = $this->caracteres[3][$indCarac];               
        }

        return $senha;
    }

    
    private function espMaiMin($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //13 especial

            $ind = rand(1,3);

            switch ($ind) {
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

    private function espMai($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //13 especial

            $ind = rand(2,3);

            switch ($ind) {
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

    private function espMin($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //13 especial

            $sorteio = [1,3];
            $ind = rand(0,1);

            switch ($sorteio[$ind]) {
                case 3:
                    $indCarac = rand(0,12);
                    $senha[] = $this->caracteres[$sorteio[$ind]][$indCarac];
                    break;

                default:
                    $indCarac = rand(0,26);
                    $senha[] = $this->caracteres[$sorteio[$ind]][$indCarac];
                    break;
            }
        }

        return $senha;
    }

    private function espNum($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //13 especial

            $sorteio = [3,0];
            $ind = rand(0,1);

            switch ($sorteio[$ind]) {
                case 3:
                    $indCarac = rand(0,9);
                    $senha[] = $this->caracteres[$sorteio[$ind]][$indCarac];
                    break;

                default:
                    $indCarac = rand(0,9);
                    $senha[] = $this->caracteres[$sorteio[$ind]][$indCarac];
                    break;
            }
        }

        return $senha;
    }

    private function maiMin($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //13 especial

            
            $ind = rand(1,2);

            switch ($ind) {
                case 1:
                    $indCarac = rand(0,26);
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

    private function maiNum($qtdCaracter){
        for($i=0; $i < $qtdCaracter; $i++){
            //27 alfabeto
            //13 especial
           
            $sorteio = [0,2];

            $ind = rand(0,1);

            switch ($sorteio[$ind]) {
                case 0:
                    $indCarac = rand(0,9);
                    $senha[] = $this->caracteres[$sorteio[$ind]][$indCarac];
                    break;

                default:
                    $indCarac = rand(0,26);
                    $senha[] = $this->caracteres[$sorteio[$ind]][$indCarac];
                    break;
            }
        }

        return $senha;
    }

    

}