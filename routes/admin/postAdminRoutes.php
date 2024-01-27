<?php
// router admin handle Post
$router->get('/admin/bai-viet/danh-sach', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->index();
});

$router->get('/admin/bai-viet/chi-tiet', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->detail();
});

$router->get('/admin/bai-viet/them', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->create();
});
$router->get('/admin/bai-viet/cap-nhat', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->edit();
});

$router->post('/admin/bai-viet/add', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->addPost();
});

$router->post('/admin/bai-viet/upload', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->upload();
});

$router->post('/admin/bai-viet/update', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->updatePost();
});

$router->post('/admin/bai-viet/delete/(\d+)', function ($postId) {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->deletePost($postId);
});


?>