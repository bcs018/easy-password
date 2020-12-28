<?php
namespace src\models;
use \core\Model;

class Categoria extends Model {
    
    public function inserirCate($cat){
        $sql =  "INSERT INTO categoria (nome_categoria, usuario_id) VALUES (?,?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $cat);
        $sql->bindValue(2, $_SESSION['log']['id']);
        $sql->execute();
    }

    public function excluirCate($id){
        //Verificando se existe senha vinculada a categoria
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
            return 1; 
        }
        
        $sql = "DELETE FROM categoria WHERE categoria_id = ? AND usuario_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, $_SESSION['log']['id']);
        $sql->execute();

        //Se caso não fizer o delete retorna 2 para exibir msg na tela
        if($sql->rowCount() == 0){
            return 2; 
        }

    }

    public function consultarCate($id){
        $sql = "SELECT * FROM categoria WHERE categoria_id = ? AND usuario_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, $_SESSION['log']['id']);
        $sql->execute();

        return $sql->fetch();
    }

    public function editarCate($id, $nomeCate){
        $sql = "UPDATE categoria SET nome_categoria = ? WHERE categoria_id = ? AND usuario_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $nomeCate);
        $sql->bindValue(2, $id);
        $sql->bindValue(3, $_SESSION['log']['id']);
        $sql->execute();
        
        if($sql->rowCount() == 0){
            return 2; 
        }
    }

}