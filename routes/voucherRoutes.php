<?php
$router->get('/shopee', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShoppee();
    logUserAccess();
});

$router->get('/shopee/thoi-trang', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeFashion();
    logUserAccess();
});

$router->get('/shopee/toan-san', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeAll();
    logUserAccess();
});

$router->get('/shopee/shopee-mail', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeMail();
    logUserAccess();
});

$router->get('/shopee/extra', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeExtra();
    logUserAccess();
});

$router->get('/shopee/tieu-dung', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeConsum();
    logUserAccess();
});
$router->get('/shopee/doi-song', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeLife();
    logUserAccess();
});
$router->get('/shopee/dien-tu', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShopeeElectronic();
    logUserAccess();
});

$router->get('/tiki', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showTiki();
    logUserAccess();
});
$router->get('/lazada', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showLazada();
    logUserAccess();
});
$router->get('/shopee-food', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->shopeeFood();
    logUserAccess();
});



?>