<?php
namespace Base\Models;

use Core\Interfaces\UserInterface;
use Core\Interfaces\DatabaseInterface;
use mysqli;

class User implements UserInterface {
    private $connection;
    private const USERTABLE = 'users'; 

    public function __construct(DatabaseInterface $dbObj) {
        $connection = $dbObj -> connect();
        $this->connection = $connection;
    }

    public function fetch(){
        $query = "SELECT * FROM  " . self::USERTABLE;
        try{
        $result = $this->connection -> query($query);
        $rows = $result -> fetch_all(MYSQLI_ASSOC);
        }catch(\mysqli_sql_exception $e) {
            echo $e -> getMessage();
        }
        return $rows;
    }

    public function fetchById(int $id){
        $stmt = "SELECT * FROM " . self::USERTABLE . " WHERE user_id = ?";
        try{
        $stmt = $this->connection -> prepare($stmt);
        $stmt -> bind_param("i",$id);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();
        }catch(\mysqli_sql_exception $e) {
            echo $e -> getMessage();
        }
        return $row;
    }

    public function fetchByUsername(string $username){
        $stmt = "SELECT * FROM ". self::USERTABLE ." WHERE username = ?";
        try{    
        $stmt = $this->connection->prepare($stmt);
        $stmt -> bind_param("s",$username);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $row = $result -> fetch_assoc();
        }catch(\mysqli_sql_exception $e) {
            echo $e -> getMessage();
        }
        return $row;
    }

    public function create(array $data){
        $stmt = "INSERT INTO  " . self::USERTABLE . "  (username, password, firstname, lastname, role) VALUES (?, ?, ?, ?, ?)";
        try{
        $stmt = $this->connection -> prepare($stmt);
        $user = $data[0];
        $passw = $data[1];
        $fname = $data[2];
        $lname = $data [3];
        $role = "newbie";
        $stmt -> bind_param("sssss", $user, $passw, $fname, $lname, $role);
        $stmt -> execute();
        }catch(\mysqli_sql_exception $e) {
            echo $e -> getMessage();
        }
    }
    
    public function update(int $id, array $data){
        $stmt = "UPDATE  " . self::USERTABLE . "  SET `username`= ? ,`password`= ? ,`firstname`= ? ,`lastname`= ? WHERE user_id = ? ";
        try{
        $stmt = $this->connection -> prepare($stmt);
        $user = $data[0];
        $passw = $data[1];
        $fname = $data[2];
        $lname = $data [3];
        $stmt -> bind_param("sssss", $user, $passw, $fname, $lname, $id);
        $stmt -> execute();
        }catch(\mysqli_sql_exception $e) {
            echo $e -> getMessage();
        }
    }
    public function delete(int $id){
        $stmt = "DELETE FROM  " . self::USERTABLE . " WHERE user_id = ?";
        try{
        $stmt = $this->connection-> prepare($stmt);
        $stmt -> bind_param("i",$id);
        $stmt -> execute();
        }catch(\mysqli_sql_exception $e) {
            echo $e -> getMessage();
        }
    }
}