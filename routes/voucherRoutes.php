<?php
$router->get('/shopee', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShoppee();
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
$router->get('/tiktok-shop', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->tiktokShop();
    logUserAccess();
});



?>