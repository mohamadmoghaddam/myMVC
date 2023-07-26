<?php 
namespace Core;

use Core\Interfaces\ControllerInterface;

class BaseController implements ControllerInterface {

    public function renderView($moduleType, $controllerName, $view, $data = [])
    {
        require_once "../app/$moduletype/Views/$controllerName/$view.php";
    }

};




?>