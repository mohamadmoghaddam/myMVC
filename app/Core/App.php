<?php
namespace Core;

class App {
    private $controller;
    private $action;
    private $params = [];

    private function parseUrl(){
        $request = trim($_SERVER['REQUEST_URI'], '/');
        $request = filter_var($request, FILTER_SANITIZE_URL);
        $request = explode('/', $request);
        return $request;
    }
    
}