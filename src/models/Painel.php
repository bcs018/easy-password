<?php
namespace src\models;
use \core\Model;

class Painel extends Model {
    public function listaCate(){
        $sql = "SELECT * FROM categoria WHERE usuario_id = ? OR usuario_id is null";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->execute();

        return $sql->fetchAll();
    }
    
    public function inserirCate($cat){
        $sql =  "INSERT INTO categoria (nome_categoria, usuario_id) VALUES (?,?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $cat);
        $sql->bindValue(2, $_SESSION['log']['id']);
        $sql->execute();
    }

    public function excluirCate($id){
        $sql = "SELECT * FROM categoria c 
                JOIN cat_sen cs
                ON cs.categoria_id = c.categoria_id
                JOIN senha s
                ON s.senha_id = cs.senha_id
                WHERE c.categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
        
        $sql = "DELETE FROM categoria WHERE categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
    }

    public function consultarCate($id){
        $sql = "SELECT * FROM categoria WHERE categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        return $sql->fetch();
    }

    public function editarCate($id, $nomeCate){
        $sql = "UPDATE categoria SET nome_categoria = ? WHERE categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $nomeCate);
        $sql->bindValue(2, $id);
        $sql->execute();
    }

    public function editNick($nick, $id){
        $sql = "UPDATE usuario SET nickname = ? WHERE usuario_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $nick);
        $sql->bindValue(2, $id);
        $sql->execute();
    }

    public function editSenha($senha, $id){
        $sql = "UPDATE usuario SET senha = ? WHERE usuario_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, md5($senha));
        $sql->bindValue(2, $id);
        $sql->execute();
    }

    public function listSenhas(){
        $sql = "SELECT s.senha_usu, c.nome_categoria, c.categoria_id, s.alterado, s.senha_id, cs.cat_sen_id FROM senha s
                JOIN usuario u 
                ON u.usuario_id = s.usuario_id 
                JOIN cat_sen cs 
                ON cs.senha_id = s.senha_id 
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE u.usuario_id = ?
                ORDER BY c.categoria_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->execute();

        return $sql->fetchAll();
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
                WHERE u.usuario_id = ? AND s.senha_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->bindValue(2, $id);
        $sql->execute();

        if($sql->rowCount() < 1){
           return true; 
        }
        
        //Verificando se existe a mesma senha para mais de uma categoria
        //Excluir somente o registro da senha e categoria da tabela cat_sen para para desvincular a senha a categoria
        if($sql->rowCount() > 1){
            $sql = "DELETE FROM cat_sen WHERE cat_sen_id = (SELECT cs.cat_sen_id FROM senha s
                                                            JOIN usuario u 
                                                            ON u.usuario_id = s.usuario_id 
                                                            JOIN cat_sen cs 
                                                            ON cs.senha_id = s.senha_id 
                                                            JOIN categoria c 
                                                            ON c.categoria_id = cs.categoria_id
                                                            WHERE u.usuario_id = ? AND s.senha_id = ? AND c.categoria_id = ?)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $_SESSION['log']['id']);
            $sql->bindValue(2, $id);
            $sql->bindValue(3, $cat);
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

    public function consultarIteSen($idsen, $idcat){   
        //Verificar se a senha pertence ao usuario logado
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
        $sql->bindValue(2, $idsen);
        $sql->execute();

        if($sql->rowCount() < 1){
            return true; 
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
}  