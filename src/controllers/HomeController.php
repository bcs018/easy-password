<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Test;

class HomeController extends Controller {

    public function index() {
        $test = new Test();
        $usu = $test->getAll();
        $this->render('home');
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}