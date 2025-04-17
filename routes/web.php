<?php

$routes = [
    'devC/Php/user-manager' => ['controler' => 'UserController', 'method' => 'index'],
    'devC/Php/user-manager/create' => ['controler' => 'UserController', 'method' => 'createUser']
];

return $routes;