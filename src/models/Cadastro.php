<?php
namespace src\models;
use \core\Model;

class Cadastro extends Model {

    public function verLogin($login){   
        $sql = "SELECT * FROM usuarios WHERE login = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $login);
        $sql->execute();

        if($sql->rowCount() > 0){
            return 1;
        }

        return 0;
    }

    public function inserir($post){
        if(!isset($post['nick'])){
            $post['nick'] = '';
        }

        if($this->verLogin($post['login']) == 1){
            return 1;
        }

        $sql = "INSERT INTO usuarios (nickname, login, senha)
                VALUES (?,?,?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $post['nick']);
        $sql->bindValue(2, $post['login']);
        $sql->bindValue(3, md5($post['senha']) );
        $sql->execute();

        return 0;
    }

}