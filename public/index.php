<?php

// load routes


require_once __DIR__ .'/../routes/web.php';

// load helper

require_once __DIR__.'/../helpers/function.php';

// Lấy URI hiện tại
$uri = parse_url(url: $_SERVER['REQUEST_URI'], component: PHP_URL_PATH);
// Bỏ dấu gạch dưới ở đầu và cuối
$requestUri = trim($uri, '/');
if(!isset($routes[$requestUri])) {
    http_response_code(404);
    echo "Không có trang hiện tại trên hệ thống!";
    exit;
}

$route = $routes[$requestUri];


// load controller
$controllerName = $route['controler'];
// load tên hàm
$method = $route['method'];
// load file controller
require_once __DIR__.'/../controllers/'.$controllerName.'.php';

// khởi tạo controller

$controller = new $controllerName();
// kiểm tra xem hàm có tồn tại không
if(!method_exists($controller, $method)) {
    http_response_code(404);
    echo "Không có hàm này trong controller!";
    exit;
}
// gọi hàm
$controller->$method();