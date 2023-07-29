<?php 
namespace Base\Controllers;

use Base\Classes\Session;
use \Core\BaseController;

class DefaultController extends BaseController {

    public function login(){
        if(isset($_POST['submit'])){
            $this->signIn();
        }else{
        parent::renderView('Base', 'default', 'login');
        }
    }

    private function signIn(){
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
            parent::renderView('Base', 'default', 'login', ['Wrong username or password']);
        }
    }

    public function register(){
        if(isset($_POST['submit'])){
            $this->signUp();
        }else{
        parent::renderView('Base', 'default', 'register');
        }
    }

    private function signUp(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        if(empty($username) or empty($password)){
            parent::renderView('Base', 'default', 'register',['Fill the required fields!']);
        }else{
        $dbObj = new \Base\Config\Database();
        $user = new \Base\Models\User($dbObj);
        $data = [$username, $password, $fname, $lname];
        $user -> create($data);
        parent::renderView('Base', 'default', 'login', ['You are registered! Now log in.']);
        }
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




