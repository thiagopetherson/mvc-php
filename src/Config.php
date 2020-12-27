<?php
namespace src;

class Config {
    const BASE_DIR = '/mvc-2020-b7/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_DATABASE = 'b7_mvc_2020';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_OPTIONS = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'');

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}