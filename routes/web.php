<?php

$routes = [
    'devC/Php/user-manager' => ['controller' => 'UserController', 'method' => 'index'],
    'devC/Php/user-manager/create' => ['controller' => 'UserController', 'method' => 'createUser'],
    'devC/Php/user-manager/add' => ['controller' => 'Usercontroller', 'method' => 'addUser']
];

return $routes;