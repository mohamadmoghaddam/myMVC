<?php 
namespace Base\Config;

use \Core\Interfaces\ProxyInterface;
use \Core\Interfaces\DatabaseInterface;


class ProxyDatabase implements ProxyInterface {
    #dynamic database name
    /*public $dbName;*/
    private static $instance = null;
    /*public function __construct(DatabaseInterface $dbName){
        $this->dbName = $dbName;
    }*/
    public function getConnection()
    {
        if (null === self::$instance) {
            self::$instance = new MysqlDatabase;
        }
        return (self::$instance) -> getConnection();
    }
}