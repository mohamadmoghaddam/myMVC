<?php 
namespace Base\Controllers;

use Core\BaseController;

class DefaultController extends BaseController {

    public function login(){
        parent::renderView('Base', 'default', 'login');
    }

    public function register(){
        parent::renderView('Base', 'default', 'register');
    }

    public function users(){
        parent::renderView('Base', 'default', 'users');
    }

    public function edituser($id = null){
        parent::renderView('Base', 'default', 'edituser' , ['id' => $id ]);
    }

    public function notfound(){
        parent::renderView('Base', 'default', 'notfound');
    }

}




