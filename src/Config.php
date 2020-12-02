<?php
namespace src;
use \core\Environment;

if(Environment::ENVIRONMENT == 'local'){
    define('BASE_URI', 'http://localhost/easy-password/public');
}else{
    define('BASE_URI', '');
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




