<?php
namespace src\models;
use \core\Model;

class Senha extends Model {

    private $caracteres = [
        [1,2,3,4,5,6,7,8,9,0],
        ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','ç'],
        ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','Ç'],
        ['!','@','#','$','%','&','*','/','?','+','-', '<', '>', ]
      ];

    public function gerarSenha($post){
        /* Se as opções caracter especiais, letra maiuscula, letra minuscula, e numeros estiver marcadas */
        if(isset($post['carac_espec']) && isset($post['letra_mai']) && isset($post['letra_min']) && isset($post['numero'])){              
            return $this->calcularSenha($post['qtd_carac'], [0,3]);
        }

        /* Se as opções letra maiuscula, letra minuscula, e numeros estiver marcadas */
        if(isset($post['letra_mai']) && isset($post['letra_min']) && isset($post['numero'])){       
            return $this->calcularSenha($post['qtd_carac'], [0,2]);
        }

        /* Se as opções especiais, letra maiuscula, e numeros estiver marcadas */
        if(isset($post['carac_espec']) && isset($post['letra_mai']) && isset($post['numero'])){       
            return $this->calcularSenha($post['qtd_carac'], [0,2,3], 2);
        }

        /* Se as opções especiais, letra maiuscula, e numeros estiver marcadas */
        if(isset($post['carac_espec']) && isset($post['letra_min']) && isset($post['numero'])){       
            return $this->calcularSenha($post['qtd_carac'], [0,1,3], 2);
        }

        /* Se as opções letra minuscula e numeros estiver marcadas */
        if(isset($post['letra_min']) && isset($post['numero'])){
            return $this->calcularSenha($post['qtd_carac'], [0,1]);  
        }

        /* Se as opções caracter especiais, letra maiuscula, letra minuscula marcadas */
        if(isset($post['carac_espec']) && isset($post['letra_mai']) && isset($post['letra_min'])){   
            return $this->calcularSenha($post['qtd_carac'], [1,3]); 
        }

        /* Se as opções caracter especiais, letra maiuscula marcadas */
        if(isset($post['carac_espec']) && isset($post['letra_mai'])){   
            return $this->calcularSenha($post['qtd_carac'], [2,3]);
        }

        /* Se as opções caracter especiais, letra minuscula marcadas */
        if(isset($post['carac_espec']) && isset($post['letra_min'])){   
            return $this->calcularSenha($post['qtd_carac'], [1,3], 1);
        }

        /* Se as opções caracter especiais, numero marcadas */
        if(isset($post['carac_espec']) && isset($post['numero'])){   
            return $this->calcularSenha($post['qtd_carac'], [0,3], 1);
        }

        /* Se as opção maiusculo e minusculo estiver marcadas */
        if(isset($post['letra_mai']) && isset($post['letra_min'])){  
            return $this->calcularSenha($post['qtd_carac'], [1,2]);
         }

        /* Se as opção maiusculo e numero estiver marcadas */
        if(isset($post['letra_mai']) && isset($post['numero'])){  
            return $this->calcularSenha($post['qtd_carac'], [0,2], 1);
        }

        /**
         * opções sozinhos
         */

        /* Se as opção numeros estiver marcadas */
        if(isset($post['numero'])){
            return $this->calcularSenha($post['qtd_carac'], [0,0]);
        }

        /* Se as opção minuscula estiver marcadas */
        if(isset($post['letra_min'])){
            return $this->calcularSenha($post['qtd_carac'], [1,1]);
        }
        
        /* Se as opção maiuscula estiver marcadas */
        if(isset($post['letra_mai'])){
            return $this->calcularSenha($post['qtd_carac'], [2,2]);
        }

         /* Se as opção especial estiver marcadas */
         if(isset($post['carac_espec'])){
            return $this->calcularSenha($post['qtd_carac'], [3,3]);
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

    public function inserirSen($senhaGravar, $alterou, $categorias){        
        $sql = "INSERT INTO senha (senha_usu, usuario_id, alterado) 
                VALUES (?,?,?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $senhaGravar);
        $sql->bindValue(2, $_SESSION['log']['id']);
        $sql->bindValue(3, $alterou);
        $sql->execute();

        /* Pega o ultimo id da senha inserida */
        $sql = "SELECT last_insert_id() as 'ult'";
        $idSenha = $this->db->query($sql)->fetch();

        if(empty($categorias)){
            $sql = "INSERT INTO cat_sen (categoria_id, senha_id)
                    VALUES (?,?)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, 1);
            $sql->bindValue(2, $idSenha['ult']);
            $sql->execute();
        }else{
            foreach($categorias as $categoria){
                $sql = "INSERT INTO cat_sen (categoria_id, senha_id)
                        VALUES (?,?)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(1, $categoria);
                $sql->bindValue(2, $idSenha['ult']);
                $sql->execute();
            }
        }

        //Sera exibido uma mensagem na sessão que está destinada a erro de usuario não logado, para não criar outra sessão usei essa mesmo
        $_SESSION['errorLog'] = '<script> toastr.success("Senha cadastrada com sucesso!"); </script>';
    }

    public function excluirSen($id=0, $cat=0){
        //Verificar se a senha pertence ao usuario logado
        $sql = "SELECT cs.cat_sen_id FROM senha s
                JOIN usuario u 
                ON u.usuario_id = s.usuario_id 
                JOIN cat_sen cs 
                ON cs.senha_id = s.senha_id 
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE u.usuario_id = ? AND cs.senha_id = ? AND cs.categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->bindValue(2, $id);
        $sql->bindValue(3, $cat);
        $sql->execute();

        if($sql->rowCount() < 1){
           return true; 
        }

        //Verificando se existe a mesma senha para mais de uma categoria
        $sql = "SELECT cs.cat_sen_id FROM senha s
                JOIN usuario u 
                ON u.usuario_id = s.usuario_id 
                JOIN cat_sen cs 
                ON cs.senha_id = s.senha_id 
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE u.usuario_id = ? AND s.senha_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->bindValue(2, $id);
        $sql->execute();
        
        //Excluir somente o registro da senha e categoria da tabela cat_sen para para desvincular a senha a categoria
        if($sql->rowCount() > 1){
            //Feito esse select antes, pois estava dando erro http 500, provavelmente de sobrecarga de serviço no servidor a rodar esse select junto com o delete
            $sql = "SELECT cs.cat_sen_id FROM senha s
                    JOIN usuario u 
                    ON u.usuario_id = s.usuario_id 
                    JOIN cat_sen cs 
                    ON cs.senha_id = s.senha_id 
                    JOIN categoria c 
                    ON c.categoria_id = cs.categoria_id
                    WHERE u.usuario_id = ? AND s.senha_id = ? AND c.categoria_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $_SESSION['log']['id']);
            $sql->bindValue(2, $id);
            $sql->bindValue(3, $cat);
            $sql->execute();

            $cat_sen_id = $sql->fetch();

            $sql = "DELETE FROM cat_sen WHERE cat_sen_id = ?";/*(SELECT cs.cat_sen_id FROM senha s
                                                            JOIN usuario u 
                                                            ON u.usuario_id = s.usuario_id 
                                                            JOIN cat_sen cs 
                                                            ON cs.senha_id = s.senha_id 
                                                            JOIN categoria c 
                                                            ON c.categoria_id = cs.categoria_id
                                                            WHERE u.usuario_id = ? AND s.senha_id = ? AND c.categoria_id = ?)";*/
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $cat_sen_id['cat_sen_id']);
            $sql->execute();

            return false;
        }else{
            //Senão deleta a senha e o cat_sen do banco
            $sql = "DELETE FROM cat_sen WHERE senha_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

            $sql = "DELETE FROM senha WHERE senha_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

            return false;
        }
   }

   public function consultarSen($idsen, $idcat){   
        //Verificar se a senha pertence ao usuario logado
        $sql = "SELECT cs.cat_sen_id FROM senha s
                JOIN usuario u 
                ON u.usuario_id = s.usuario_id 
                JOIN cat_sen cs 
                ON cs.senha_id = s.senha_id 
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE u.usuario_id = ? AND cs.senha_id = ? AND cs.categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->bindValue(2, $idsen);
        $sql->bindValue(3, $idcat);
        $sql->execute();

        if($sql->rowCount() == 0){
            return 1; 
        }

        $sql = "SELECT s.senha_id, s.senha_usu, c.categoria_id, c.nome_categoria, c.usuario_id FROM senha s 
                JOIN cat_sen cs
                ON cs.senha_id = s.senha_id
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE cs.categoria_id = ? AND cs.senha_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $idcat);
        $sql->bindValue(2, $idsen);
        $sql->execute();
        
        return $sql->fetch();
    }   
    
    public function editarSen($categorias, $senha, $idsen, $idcat){
        $idsenNov['ult'] = $idsen;
        
        //Verificar se a senha pertence ao usuario logado
        $sql = "SELECT cs.cat_sen_id FROM senha s
                JOIN usuario u 
                ON u.usuario_id = s.usuario_id 
                JOIN cat_sen cs 
                ON cs.senha_id = s.senha_id 
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE u.usuario_id = ? AND cs.senha_id = ? AND cs.categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->bindValue(2, $idsen);
        $sql->bindValue(3, $idcat);
        $sql->execute();

        if($sql->rowCount() == 0){
            return 1; 
        }

        // Verificando se existe uma senha vinculada a mais de uma categoria
        $sql = "SELECT * FROM cat_sen WHERE senha_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $idsen);
        $sql->execute();

        // Se existir somente uma senha para uma categoria, faz o update
        if($sql->rowCount() == 1){
            $sql = "UPDATE senha SET senha_usu = ?, alterado = ?
                    WHERE senha_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $senha);
            $sql->bindValue(2, 1);
            $sql->bindValue(3, $idsen);
            $sql->execute();
        }else{
            //Fazendo um novo insert pois a mesma senha existe para mais de uma categoria e se fazer update nela sera feito para todas categorias
            $sql = "INSERT INTO senha (senha_usu, usuario_id, alterado) 
                    VALUES (?,?,?)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $senha);
            $sql->bindValue(2, $_SESSION['log']['id']);
            $sql->bindValue(3, 1);
            $sql->execute();

            /* Pega o ultimo id da senha inserida */
            $sql = "SELECT last_insert_id() as 'ult'";
            $idsenNov = $this->db->query($sql)->fetch();
        }

        //Deletando o registro que vincula a senha com a categoria p/ cadastrar tudo de novo de acordo com o que o usuario selecionou
        $sql = "DELETE FROM cat_sen WHERE categoria_id = ? AND senha_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $idcat);
        $sql->bindValue(2, $idsen);
        $sql->execute();

        foreach($categorias as $categoria){
            $sql = "INSERT INTO cat_sen (categoria_id, senha_id)
                    VALUES (?,?)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $categoria);
            $sql->bindValue(2, $idsenNov['ult']);
            $sql->execute();
        }
    }
}