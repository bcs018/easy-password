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
    const DB_HOST     = 'sql203.epizy.com';
    const DB_DATABASE = 'epiz_27575006_easypassword';
    CONST DB_USER     = 'epiz_27575006';
    const DB_PASS     = 'xs9JZAFkix8s';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION   = 'index';
}