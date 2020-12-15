<?php
namespace src\models;
use \core\Model;

class Painel extends Model {
    public function listaCate(){
        $sql = "SELECT * FROM categoria";
        $sql = $this->db->query($sql);

        return $sql->fetchAll();
    }
    
    public function inserirCate($cat){
        $sql =  "INSERT INTO categoria (nome_categoria) VALUES (?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $cat);
        $sql->execute();
    }

    public function excluirCate($id){
        $sql = "DELETE FROM categoria WHERE categoria_id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
    }

    public function editarCate($id){
        
    }
} 