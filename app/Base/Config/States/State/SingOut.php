<?php  
namespace Base\Config\States\State;

use \Core\Interfaces\UserStateInterface;
use Base\Config\Session;
use Base\Config\MysqlDatabase;

class SignOut implements UserStateInterface {
    public function signIn(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $instance = MysqlDatabase::getInstance();
        $user = new \Base\Models\User($instance);
        $row= $user -> fetchByUsername($username);
        unset($_POST);
        if ((!empty($username) and $username == $row['username']) and (!empty($password) and $password == $row['password'])){
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            Session::set('username', $username);
            Session::set('firstname', $fname);
            Session::set('lastname', $lname);

            header("Location:http://mvc.local/users");
        }else{
            header("Location:http://mvc.local/login");
        }
    }
    public function signOut(){
        header("Location:http://mvc.local/login");
    }
    public function signUp(){
        header("Location:http://mvc.local/register");
    }
}