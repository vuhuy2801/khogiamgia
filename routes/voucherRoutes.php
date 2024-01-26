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
$router->get('/shopee-food', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->shopeeFood();
    logUserAccess();
});



?>