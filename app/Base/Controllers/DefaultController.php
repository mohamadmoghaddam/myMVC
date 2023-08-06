<?php 
namespace Base\Controllers;

use Base\Config\Session;
use \Core\BaseController;
use Base\Config\MysqlDatabase;

class DefaultController extends BaseController {

    public function login(){
        if(isset($_POST['submit'])){
            $this->signIn();
        }else if(Session::get('username') != null)
        {  
            header("Location:http://mvc.local/users");
        }
        else{
        parent::renderView('Base', 'default', 'login');
        }
    }

    private function signIn(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new \Base\Models\User();
        $row= $user -> fetchByUsername($username);
        unset($_POST);
        if ((!empty($username) and !empty($password)) and (!empty($row['username']) and !empty($row['password'])) and ($username == $row['username'] and $password == $row['password'])){
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            Session::set('username', $username);
            Session::set('firstname', $fname);
            Session::set('lastname', $lname);

            header("Location:http://mvc.local/users");
        }else{
            parent::renderView('Base', 'default', 'login', ['Wrong username or password']);
        }
    }

    public function register(){
        if(isset($_POST['submit'])){
            $this->signUp();
        }else if(Session::get('username') != null){  
            header("Location:http://mvc.local/users");
        }else{
        parent::renderView('Base', 'default', 'register');
        }
    }

    private function signUp()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        if(empty($username) or empty($password)){
            parent::renderView('Base', 'default', 'register',['Fill the required fields!']);
        }else if($password == $confirmpassword){
        $data = [$username, $password, $fname, $lname]; 
        $user = new \Base\Models\User();
        $user -> create($data);
        unset($_POST);
        header("Location:http://mvc.local/login");
        }else{
            parent::renderView('Base', 'default', 'register' , ['Password and confirm are not the same!']);
        }
    }

    public function users()
    {
        if(Session::get('username') != null){
                $user = new \Base\Models\User();
                $rows = $user->fetch();
                parent::renderView('Base', 'default', 'users', $rows);
        }
        else{
            header("Location:http://mvc.local/login");
        }
    }

    public function edituser($action = 'edit',$id = null)
    {
        if(Session::get('username') != null){
            if ($action == 'edit'){
                $user = new \Base\Models\User();
                $row= $user -> fetchById($id);
                if(isset($_POST['submit']))
                {
                    $this->updateUser($id, $row);
                }else
                {
                parent::renderView('Base', 'default', 'edituser' , $row);
                }
            }else if($action == 'delete'){
                $user = new \Base\Models\User();
                $user->delete($id);
                header("Location:http://mvc.local/users");
            }else{
                header("Location:http://mvc.local/login");
            }
        }
        else{
            header("Location:http://mvc.local/login");
        }
        
    }
    private function updateUser(int $id, $row)
    {
        if($_POST['submit'] == 'submit'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            unset($_POST);
            if(empty($username) or empty($password)){
                parent::renderView('Base', 'default', 'edituser' , $row);
                echo "fill the required fields!";
            }else if($password == $confirmpassword){
            $user = new \Base\Models\User();
            $data = [$username, $password, $fname, $lname];
            $user -> update($id, $data);
            header("Location:http://mvc.local/users");
            }else{
                parent::renderView('Base', 'default', 'edituser' , $row);
                echo "password and confirm are not the same!";
            }
        }
        else
        {
            header("Location:http://mvc.local/users");
        }
    }
    public function logout()
    {   
        Session::destroy();
        header("Location:http://mvc.local/login");
    }
    public function notfound()
    {
        parent::renderView('Base', 'default', 'notfound');
    }

}




