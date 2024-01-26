<?php


$router->get('/api/lich-su-gia', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->getHistoryPriceProduct();
});

$router->post('/api/lay-loi-khuyen', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->getAdviceProduct();
});
// api bài viết sắp xếp theo ngày
$router->get('/api/bai-viets', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->getPostListApi();
});



?>