<?php
namespace Base\Config;

use mysqli;

class Database {
    private const HOST = 'localhost';
    private const DBNAME = 'mvc';
    private const USER = 'root';
    private const PASS = '';
    private $conn = null;

    public function connect() 
    {
        try{
            $con = new mysqli(self::HOST, self::DBNAME, self::USER, self::PASS);
        } catch(\mysqli_sql_exception $e) {
             echo $e -> getMessage();
        }
        return $this->conn;
    }
}