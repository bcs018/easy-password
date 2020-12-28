<?php
namespace src\models;
use \core\Model;

class Login extends Model {
    public function validarAutentic($email, $senha){
        $sql = "SELECT * FROM usuario WHERE login = ? AND senha = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, md5($senha));
        $sql->execute();
        $dados = $sql->fetch();

        if($sql->rowCount() > 0){
            $_SESSION['log'] = ['nick' => $dados['nickname'], 'id' => $dados['usuario_id']];
            return 1;
        }
        
        return 0;
    }
}
 