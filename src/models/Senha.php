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

    public function __construct($post=0){
        $this->post = $post;
    }

    public function gerarSenha(){
        /* Se as opções caracter especiais, letra maiuscula, letra minuscula, e numeros estiver marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai']) && isset($this->post['letra_min']) && isset($this->post['numero'])){              
            return $this->calcularSenha($this->post['qtd_carac'], [0,3]);
        }

        /* Se as opções letra maiuscula, letra minuscula, e numeros estiver marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['letra_min']) && isset($this->post['numero'])){       
            return $this->calcularSenha($this->post['qtd_carac'], [0,2]);
        }

        /* Se as opções especiais, letra maiuscula, e numeros estiver marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai']) && isset($this->post['numero'])){       
            return $this->calcularSenha($this->post['qtd_carac'], [0,2,3], 2);
        }

        /* Se as opções especiais, letra maiuscula, e numeros estiver marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_min']) && isset($this->post['numero'])){       
            return $this->calcularSenha($this->post['qtd_carac'], [0,1,3], 2);
        }

        /* Se as opções letra minuscula e numeros estiver marcadas */
        if(isset($this->post['letra_min']) && isset($this->post['numero'])){
            return $this->calcularSenha($this->post['qtd_carac'], [0,1]);  
        }

        /* Se as opções caracter especiais, letra maiuscula, letra minuscula marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai']) && isset($this->post['letra_min'])){   
            return $this->calcularSenha($this->post['qtd_carac'], [1,3]); 
        }

        /* Se as opções caracter especiais, letra maiuscula marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_mai'])){   
            return $this->calcularSenha($this->post['qtd_carac'], [2,3]);
        }

        /* Se as opções caracter especiais, letra minuscula marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['letra_min'])){   
            return $this->calcularSenha($this->post['qtd_carac'], [1,3], 1);
        }

        /* Se as opções caracter especiais, numero marcadas */
        if(isset($this->post['carac_espec']) && isset($this->post['numero'])){   
            return $this->calcularSenha($this->post['qtd_carac'], [0,3], 1);
        }

        /* Se as opção maiusculo e minusculo estiver marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['letra_min'])){  
            return $this->calcularSenha($this->post['qtd_carac'], [1,2]);
         }

        /* Se as opção maiusculo e numero estiver marcadas */
        if(isset($this->post['letra_mai']) && isset($this->post['numero'])){  
            return $this->calcularSenha($this->post['qtd_carac'], [0,2], 1);
        }

        /**
         * opções sozinhos
         */

        /* Se as opção numeros estiver marcadas */
        if(isset($this->post['numero'])){
            return $this->calcularSenha($this->post['qtd_carac'], [0,0]);
        }

        /* Se as opção minuscula estiver marcadas */
        if(isset($this->post['letra_min'])){
            return $this->calcularSenha($this->post['qtd_carac'], [1,1]);
        }
        
        /* Se as opção maiuscula estiver marcadas */
        if(isset($this->post['letra_mai'])){
            return $this->calcularSenha($this->post['qtd_carac'], [2,2]);
        }

         /* Se as opção especial estiver marcadas */
         if(isset($this->post['carac_espec'])){
            return $this->calcularSenha($this->post['qtd_carac'], [3,3]);
         }
    }

    /* ---- Calcular a senha ---- */

    private function calcularSenha($qtdCaracter, $pos, $param = 0){
        $senha = [];
        for($i=0; $i < $qtdCaracter; $i++){

            //Se param = 1, segnifica que são opções duplas com indices distantes do $caracteres
            if($param == 1){
                $sorteio = rand(0,1);
                $ind = $pos[$sorteio];
            //se for = 2 significa que são itens triplos pulando uma opção 
            }elseif($param == 2){
                $sorteio = rand(0,2);
                $ind = $pos[$sorteio];
            //senão são opções com indices sequenciais no $caracters
            }else{
                $ind = rand($pos[0], $pos[1]);
            }

            //verifica qual posição do sorteio para saber se pegara numeros, especial, maiusculo ou minusculo
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

    public function inserirSen(){

    }
}