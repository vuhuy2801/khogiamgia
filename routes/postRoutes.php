<?php
$router->get('/tin-khuyen-mai/shopee', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->shopeeShow();
    logUserAccess();
});
$router->get('/tin-khuyen-mai/tiktok', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->tiktokShow();
    logUserAccess();
});
$router->get('/tin-khuyen-mai/lazada', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->lazadaShow();
    logUserAccess();
});
$router->get('/huong-dan/shopee', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->shopeeShow();
    logUserAccess();
});
$router->get('/huong-dan/lazada', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->lazadaShow();
    logUserAccess();
});
$router->get('/huong-dan/shopee-food', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->shopeeFoodShow();
    logUserAccess();
});

// bài viết
$router->get('/bai-viet/([a-z0-9_-]+)', function ($slug) {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->getPostDetailBySlug($slug);
    logUserAccess();
});


?>