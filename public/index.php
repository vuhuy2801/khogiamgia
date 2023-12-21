<?php
// FILEPATH: /c:/Users/ADMIN/Documents/lap-trinh-web-voi-php/bai-tap-lon/khogiamgia/public/index.php

// Định nghĩa các đường dẫn và tên file
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('CONTROLLER_PATH', APP_PATH . '/controllers');
define('VIEW_PATH', APP_PATH . '/views');

// Lấy thông tin về đường dẫn yêu cầu
$requestUri = $_SERVER['REQUEST_URI'];

// Phân tích đường dẫn yêu cầu để xác định controller và action
$parts = explode('/', $requestUri);
$controllerName = ucfirst($parts[1] ?? 'home') . 'Controller';
$actionName = $parts[2] ?? 'index';

// Kiểm tra xem file controller có tồn tại không
$controllerFile = CONTROLLER_PATH . '/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    // Nếu tồn tại, include file controller và tạo đối tượng controller
    require_once $controllerFile;
    $controllerClass = new $controllerName();

    // Kiểm tra xem action có tồn tại trong controller không
    if (method_exists($controllerClass, $actionName)) {
        // Nếu tồn tại, gọi action
        $controllerClass->$actionName();
    } else {
        // Nếu không tồn tại, hiển thị trang lỗi 404
        echo 'Trang không tồn tại';
    }
} else {
    // Nếu không tồn tại, hiển thị trang lỗi 404
    echo 'Trang không tồn tại';
}
?>