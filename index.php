<?php
require 'vendor/autoload.php';
session_start();
$router = new \Bramus\Router\Router();

$router->get('/', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();
   
});

$router->get('/trang-chu', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();
});


$router->get('/ma-giam-gia', function () {
    echo 'Mã giảm giá';
});
$router->get('/login', function () {
    require 'app/views/login/login.html';
});


$router->get('/shopee', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShoppee();
});

$router->get('/tiki', function () {
    echo 'tiki';
});
$router->get('/lazada', function () {
    echo 'lazada';
});
$router->get('/tiktok-shop', function () {
    echo 'tiktok-shop';
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


// router handle Post
$router->get('/admin/bai-viet/show', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->index();
});
$router->get('/admin/bai-viet/create', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->create();
});
$router->get('/admin/bai-viet/edit', function ()  {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->edit();
});

$router->post('/admin/bai-viet/add', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->addPost();
});

$router->post('/admin/bai-viet/update', function ()  {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->updatePost();
});

$router->post('/admin/bai-viet/delete/(\d+)', function ($postId)  {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->deletePost($postId);
});

$router->run();
?>