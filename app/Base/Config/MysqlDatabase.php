<?php
namespace Base\Config;

use Core\Interfaces\DatabaseInterface;
use Core\Interfaces\ProxyInterface;
use mysqli;

class MysqlDatabase implements ProxyInterface{
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PASS = '';
    private const DBNAME = 'mvc';
    private $conn = null;

    public function getConnection()
    {
        try{
            $this -> conn = new mysqli(self::HOST, self::USER, self::PASS, self::DBNAME);
        } catch(\mysqli_sql_exception $e) {
             echo $e -> getMessage();
        }
        return $this->conn;
    }

}