<?php

$routes = [
    'devC/Php/user-manager' => ['controller' => 'UserController', 'method' => 'index'],
    'devC/Php/user-manager/create' => ['controller' => 'UserController', 'method' => 'createUser'],
    'devC/Php/user-manager/add' => ['controller' => 'Usercontroller', 'method' => 'addUser'],
    'devC/Php/user-manager/update/:id' => ['controller' => 'Usercontroller', 'method' => 'updateUser'],
];

return $routes;