<?php

// Router admin handel voucher
$router->get('/admin/ma-giam-gia/danh-sach', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->index();
});


$router->get('/admin/ma-giam-gia/chi-tiet', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->detail();
});

$router->get('/admin/ma-giam-gia/them', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->create();
});


$router->get('/admin/ma-giam-gia/cap-nhat', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->edit();
});

$router->post('/admin/ma-giam-gia/add', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->add();
});

$router->post('/admin/ma-giam-gia/update', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->update();
});

$router->post('/admin/ma-giam-gia/delete/(\w+)', function ($voucherId) {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->delete($voucherId);
});


?>