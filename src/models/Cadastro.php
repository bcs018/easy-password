<?php
namespace src\models;
use \core\Model;

class Cadastro extends Model {

    public function verLogin($login){   
        $sql = "SELECT * FROM usuario WHERE login = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $login);
        $sql->execute();

        if($sql->rowCount() > 0){
            return 1;
        }

        return 0;
    }

    public function inserir($post){
        if(empty($post['nick'])){
            $post['nick'] = 'Sem nome';
        }

        if($this->verLogin($post['login']) == 1){
            return 1;
        }

        $sql = "INSERT INTO usuario (nickname, login, senha)
                VALUES (?,?,?)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $post['nick']);
        $sql->bindValue(2, $post['login']);
        $sql->bindValue(3, md5($post['senha']) );
        $sql->execute();

        return 0;
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

}
