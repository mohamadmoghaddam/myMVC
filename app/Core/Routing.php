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
            'action' => 'login'
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
            'route' => 'edituser',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'edituser'
        ],
        [   'route' => 'logout',
            'module' => 'Base',
            'controller' => 'DefaultController',
            'action' => 'logout'
        ]
    ];

    

}
















