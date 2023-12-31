<?php
namespace Core;

use Base\Controllers\DefaultController;

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
    
    public function __construct()
    {
        $url = $this->parseUrl();
        $routing = new Routing;

        if ($routing->routes){
            $this->controller = new DefaultController;
            $this->action = 'homepage';
            $controllerPlusAction = (isset($url[0]) ? $url[0] : '');
            foreach($routing->routes as $route){
                if(($route['route']) === ($controllerPlusAction)){
                    if(file_exists('../app/' . $route['module'] . '/Controllers/' . $route['controller'] . '.php')){
                        $dynamicControllerName = '\\' . $route['module'] . '\Controllers\\' . $route['controller'];
                        $this->controller = new $dynamicControllerName;
                        $this->action = $route['action'];
                        unset($url[0]);
                        break;  
                    }else {
                        $this->action = 'homepage';
                    }
                }else {
                    $this->action = 'notfound';
                }
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
}