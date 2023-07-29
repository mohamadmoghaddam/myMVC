<?php 
namespace Base\Controllers;

use Base\Classes\Session;
use \Core\BaseController;

class DefaultController extends BaseController {

    public function login(){
        if(isset($_POST['submit'])){
            $this->logUserIn();
        }else{
        parent::renderView('Base', 'default', 'login');
        }
    }

    private function logUserIn(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dbObj = new \Base\Config\Database();
        $user = new \Base\Models\User($dbObj);
        $result= $user -> fetchByUsername($username);
        $row = $result -> fetch_assoc();
        if (($username == $row['username']) and ($password == $row['password'])){
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $session = new Session;
            $session -> set('username', $username);
            $session -> set('firstname', $fname);
            $session -> set('lastname', $lname);

            $this->users();
        }else{
            parent::renderView('Base', 'default', 'login', ['wrong username or password']);
        }
    }

    public function register(){
        parent::renderView('Base', 'default', 'register');
    }

    public function users(){
        $session = new Session;
        if($session -> get('username') != null){
            $dbObj = new \Base\Config\Database();
            $user = new \Base\Models\User($dbObj);
            $rows = $user->fetch();
            parent::renderView('Base', 'default', 'users', $rows);
        }
    }

    public function edituser($id = null){
        parent::renderView('Base', 'default', 'edituser' , ['id' => $id ]);
    }

    public function notfound(){
        parent::renderView('Base', 'default', 'notfound');
    }

}




