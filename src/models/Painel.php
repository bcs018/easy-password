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
        $sql = "UPDATE categoria SET nome_categoria = ? WHERE categoria_id = ?";
    }
} 