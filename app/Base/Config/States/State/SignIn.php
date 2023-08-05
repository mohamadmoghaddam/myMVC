<?php  
namespace Base\Config\States\State;

use Base\Config\Session;
use \Core\Interfaces\UserStateInterface;

class SignIn implements UserStateInterface {
    public function signIn(){
        return new SignIn();
        header("Location:http://mvc.local/users");
    }
    public function signOut(){
        Session::destroy();
        return new SignOut();
        header("Location:http://mvc.local/login");
    }
    public function signUp(){
        return new SignIn();
        header("Location:http://mvc.local/users"); 
    }
}