<?php
// Router admin handel suppliers
$router->get('/admin/nha-cung-cap/show', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->index();
});


$router->get('/admin/nha-cung-cap/detail', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->detail();
});

$router->get('/admin/nha-cung-cap/create', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->create();
});
$router->get('/admin/nha-cung-cap/edit', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->edit();
});

$router->post('/admin/nha-cung-cap/upload', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->upload();
});

$router->post('/admin/nha-cung-cap/add', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->add();
});

$router->post('/admin/nha-cung-cap/update', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->update();
});

$router->post('/admin/nha-cung-cap/delete/(\d+)', function ($supplierId) {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->delete($supplierId);
});


?>