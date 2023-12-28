<?php
require 'vendor/autoload.php';
session_start();
$router = new \Bramus\Router\Router();

$router->get('/', function () {
    echo 'Trang chủ';
});

$router->get('/trang-chu', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();
});

$router->get('/ma-giam-gia', function () {
    echo 'Mã giảm giá';
});

$router->get('/theo-doi-ma-san-pham', function () {
    echo 'Theo dõi mã sản phẩm';
});

$router->get('/tin-khuyen-mai', function () {
    echo 'Tin khuyến mại';
});

$router->get('/huong-dan', function () {
    echo 'Hướng dẫn';
});

$router->get('/ma-giam-gia/nha-cung-cap', function () {
    echo 'Mã giảm giá/ Nhà cung cấp';
});

$router->get('/tin-khuyen-mai/chi-tiet', function () {
    echo 'Tin khuyến mại/ Chi tiết tin khuyến mại';
});

$router->get('/huong-dan/chi-tiet', function () {
    echo 'Hướng dẫn/ Chi tiết hướng dẫn';
});

$router->run();
?>