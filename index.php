<?php
require 'vendor/autoload.php';
session_start();
$router = new \Bramus\Router\Router();



$router->get('/', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();

});

$router->get('/test', function () {
    require 'scripts\InfoProductShopee.php';
    $InfoProductShopee = new InfoProductShopee('https://shopee.vn/Thi%E1%BA%BFt-b%E1%BB%8B-k%C3%ADch-s%C3%B3ng-m%E1%BB%9F-r%E1%BB%99ng-v%C3%B9ng-ph%E1%BB%A7-s%C3%B3ng-Xiaomi-Wifi-Repeater-Pro-2-t%E1%BB%91c-%C4%91%E1%BB%99-300mbps-i.243828760.6868596090');
    $InfoProductShopee->getInfo();
    $InfoProductShopee->showInFo();
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

$router->get('/tin-khuyen-mai/shopee', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->shopeeShow();
});
$router->get('/tin-khuyen-mai/tiktok', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->tiktokShow();
});
$router->get('/tin-khuyen-mai/lazada', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->lazadaShow();
});

$router->get('/huong-dan/shopee', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->shopeeShow();
});
$router->get('/huong-dan/lazada', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->lazadaShow();
});
$router->get('/huong-dan/tiktokshop', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->tiktokShow();
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
$router->get('/admin/bai-viet/edit', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->edit();
});

$router->post('/admin/bai-viet/add', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->addPost();
});

$router->post('/admin/bai-viet/update', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->updatePost();
});

$router->post('/admin/bai-viet/delete/(\d+)', function ($postId) {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->deletePost($postId);
});

$router->run();
?>