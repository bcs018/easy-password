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

}  