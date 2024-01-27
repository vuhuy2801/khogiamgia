<?php
// Router admin handel product
$router->get('/admin/theo-doi-gia-san-pham/danh-sach', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->index();
});


$router->get('/admin/theo-doi-gia-san-pham/chi-tiet', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->detail();
});

$router->get('/admin/theo-doi-gia-san-pham/them', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->create();
});


$router->get('/admin/theo-doi-gia-san-pham/cap-nhat', function () {
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

// router for search
$router->get('/admin/theo-doi-gia-san-pham/search', function () {
    require 'app/controllers/admin/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->search();
});


?>