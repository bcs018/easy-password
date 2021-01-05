<?php
namespace src;
use \core\Environment;

if(Environment::ENVIRONMENT == 'local'){
    define('BASE_URI', 'http://localhost/easy-password/home');
    define('BASE_ASS', 'http://localhost/easy-password');
}else{
    define('BASE_URI', 'https://easypassword.ml');
    define('BASE_ASS', 'https://easypassword.ml');
}

class Config {
    const BASE_DIR = '/easy-password';

    const DB_DRIVER   = 'mysql';
    const DB_HOST     = 'localhost';
    const DB_DATABASE = 'easy-password';
    CONST DB_USER     = 'root';
    const DB_PASS     = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION   = 'index';
}




