<?php 
namespace Core\Interfaces;

interface ControllerInterface {
    public function renderView($moduleType, $controllerName, $view, $data = []);
}