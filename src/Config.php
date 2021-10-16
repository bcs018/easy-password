<?php
namespace src;
use \core\Environment;

if(Environment::ENVIRONMENT == 'local'){
    define('BASE_URI', 'http://localhost/easy-password/public');
    define('BASE_ASS', 'http://localhost/easy-password');
}else{
    define('BASE_URI', 'http://easypassword.ml/home');
    define('BASE_ASS', 'http://easypassword.ml');
}

class Config {
    const BASE_DIR = 'http://easypassword.ml';

    const DB_DRIVER   = 'mysql';
    const DB_HOST     = 'localhost';
    const DB_DATABASE = 'easypassword';
    CONST DB_USER     = 'root';
    const DB_PASS     = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION   = 'index';
}