<?php
namespace src\models;
use \core\Model;

class Login extends Model {
    public function validarAutentic($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE login = ? AND senha = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            return 1;
        }
        
        return 0;
    }
}
