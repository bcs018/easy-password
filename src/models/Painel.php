<?php
namespace src\models;
use \core\Model;

class Painel extends Model {
    public function listaCate(){
        $sql = "SELECT * FROM categorias";
        $sql = $this->db->query($sql);

        return $sql->fetchAll();
    }
    
    public function inserirCate($cat){
        $sql =  "INSERT INTO categorias (nome_categoria) VALUES (?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $cat);
        $sql->execute();
    }
}