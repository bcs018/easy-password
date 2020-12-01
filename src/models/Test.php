<?php
namespace src\models;
use \core\Model;

class Test extends Model {

    public function getAll(){
        $usu = $this->db->query('SELECT * FROM USUARIOS');

        $usu = $usu->fetchAll();

    }

}