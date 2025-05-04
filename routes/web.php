<?php

$routes = [
    'devC/Php/user-manager' => ['controller' => 'UserController', 'method' => 'index'],
    'devC/Php/user-manager/create' => ['controller' => 'UserController', 'method' => 'createUser'],
    'devC/Php/user-manager/add' => ['controller' => 'UserController', 'method' => 'addUser'],
    'devC/Php/user-manager/update/:id' => ['controller' => 'UserController', 'method' => 'updateUser'],
    'devC/Php/user-manager/edit/:id' => ['controller' => 'UserController', 'method' => 'editUser'],
    'devC/Php/user-manager/delete/:id'=> ['controller' => 'UserController','method' => 'deleteUser'],
    // auth
    'devC/Php/user-manager/auth'=> ['controller' => 'AuthController','method' => 'login'],

];

return $routes;