<?php

// Router admin handel voucher
$router->get('/admin/ma-giam-gia/show', function () {
    require 'app/controllers/admin/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->index();
});


$router->get('/admin/ma-giam-gia/detail', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->detail();
});

$router->get('/admin/ma-giam-gia/create', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->create();
});


$router->get('/admin/ma-giam-gia/edit', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->edit();
});


$router->post('/admin/ma-giam-gia/upload', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->upload();
});
$router->post('/admin/ma-giam-gia/add', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->add();
});

$router->post('/admin/ma-giam-gia/update', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->update();
});

$router->post('/admin/ma-giam-gia/delete/(\w+)', function ($productId) {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->delete($productId);
});


?>