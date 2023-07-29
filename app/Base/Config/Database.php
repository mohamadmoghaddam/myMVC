<?php
namespace Base\Config;

use mysqli;

class Database {
    private const HOST = 'localhost';
    private const USER = 'root';
    private const PASS = '';
    private const DBNAME = 'mvc';
    private $conn = null;

    public function connect() 
    {
        try{
            $this -> conn = new mysqli(self::HOST, self::USER, self::PASS, self::DBNAME);
        } catch(\mysqli_sql_exception $e) {
             echo $e -> getMessage();
        }
        return $this->conn;
    }
}