<?php

// ------------------------------ api product area ------------------------------
$router->get('/api/product/lich-su-gia', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->getHistoryPriceProduct();
});

$router->post('/api/product/lay-loi-khuyen', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->getAdviceProduct();
});

//----------------------------- api post area ----------------------------------

// api bài viết sắp xếp theo ngày
$router->get('/api/post/bai-viets', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->getPostListApi();
});

// ------------------------------ api voucher area ------------------------------

// api voucher update used count
$router->post('/api/voucher/update-used-count', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->updateUsedCount();
    logUserAccess();
});




?>