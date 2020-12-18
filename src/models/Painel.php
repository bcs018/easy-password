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
        $sql = "SELECT s.senha_usu, c.nome_categoria, s.alterado FROM senha s
                JOIN usuario u 
                ON u.usuario_id = s.usuario_id 
                JOIN cat_sen cs 
                ON cs.senha_id = s.senha_id 
                JOIN categoria c 
                ON c.categoria_id = cs.categoria_id
                WHERE u.usuario_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $_SESSION['log']['id']);
        $sql->execute();

        return $sql->fetchAll();
    }
}  