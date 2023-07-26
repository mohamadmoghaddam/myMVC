<?php
namespace Core;

class Routing {

    public $routes = [
        [
            'route' => '',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'login'
        ],
        [
            'route' => 'login',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'loginw'
        ],
        [
            'route' => 'register',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'register'
        ],
        [
            'route' => 'users',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'users'
        ],
        [
            'route' => 'users/edit',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'edit_user'
        ],
    ];

    

}
















