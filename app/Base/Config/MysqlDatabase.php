<?php
namespace Base\Config;

use Core\Interfaces\DatabaseInterface;
use mysqli;

class MysqlDatabase implements DatabaseInterface {
    private static $instance = null;
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PASS = '';
    private const DBNAME = 'mvc';
    private $conn = null;

    private function __construct() 
    {
        try{
            $this -> conn = new mysqli(self::HOST, self::USER, self::PASS, self::DBNAME);
        } catch(\mysqli_sql_exception $e) {
             echo $e -> getMessage();
        }
    }
    
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new MysqlDatabase;
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

}