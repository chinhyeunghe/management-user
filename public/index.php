<?php

session_start();

// Load routes
require_once __DIR__ . '/../routes/web.php';

// Load helper
require_once __DIR__ . '/../helpers/function.php';

// Lấy URI hiện tại
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = trim($uri, '/');


$routeFound = false;

foreach ($routes as $routePattern => $target) {
    // Chuyển pattern kiểu :param thành regex
    $pattern = preg_replace('#:([a-zA-Z0-9_]+)#', '([^/]+)', $routePattern);
    $pattern = '#^' . $pattern . '$#';

    // So khớp route
    if (preg_match($pattern, $requestUri, $matches)) {
        array_shift($matches); // Bỏ full match

        $controllerName = $target['controller'];
        $method = $target['method'];

        // Load file controller
        $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
        if (!file_exists($controllerFile)) {
            http_response_code(500);
            echo "Không tìm thấy file controller: $controllerFile";
            exit;
        }

        require_once $controllerFile;

        // Khởi tạo controller
        $controller = new $controllerName();

        // Kiểm tra method có tồn tại không
        if (!method_exists($controller, $method)) {
            http_response_code(404);
            echo "Không có hàm '$method' trong controller '$controllerName'!";
            exit;
        }

        // Kiểm tra login chưa

        if (!isset($_SESSION['auth']) && $requestUri != 'devC/Php/user-manager/auth') {
            header("Location: /devC/Php/user-manager/auth");
        }
        // Kiểm tra quyền truy cập        

        // Gọi hàm + truyền tham số
        call_user_func_array([$controller, $method], $matches);
        $routeFound = true;
        break;
    }
}

// Nếu không tìm thấy route
if (!$routeFound) {
    http_response_code(404);
    echo "Không có trang hiện tại trên hệ thống!";
    exit;
}
