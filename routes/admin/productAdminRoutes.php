<?php
// Router admin handel product
$router->get('/admin/theo-doi-gia-san-pham/show', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->index();
});


$router->get('/admin/theo-doi-gia-san-pham/detail', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->detail();
});

$router->get('/admin/theo-doi-gia-san-pham/create', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->create();
});


$router->get('/admin/theo-doi-gia-san-pham/edit', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->edit();
});


$router->post('/admin/theo-doi-gia-san-pham/upload', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->upload();
});
$router->post('/admin/theo-doi-gia-san-pham/add', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->add();
});

$router->post('/admin/theo-doi-gia-san-pham/update', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->update();
});

$router->post('/admin/theo-doi-gia-san-pham/delete/(\w+)', function ($productId) {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->delete($productId);
});


?>