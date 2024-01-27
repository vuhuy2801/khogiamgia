<?php
// Router admin handel suppliers
$router->get('/admin/nha-cung-cap/danh-sach', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->index();
});


$router->get('/admin/nha-cung-cap/chi-tiet', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->detail();
});

$router->get('/admin/nha-cung-cap/them', function () {
    require 'app/controllers/admin/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->create();
});
$router->get('/admin/nha-cung-cap/cap-nhat', function () {
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