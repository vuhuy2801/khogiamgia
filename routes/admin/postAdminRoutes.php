<?php
// router admin handle Post
$router->get('/admin/bai-viet/show', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->index();
});

$router->get('/admin/bai-viet/detail', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->detail();
});

$router->get('/admin/bai-viet/create', function () {
    require 'app/controllers/admin/PostController.php';
    $PostController = new PostController();
    $PostController->create();
});
$router->get('/admin/bai-viet/edit', function () {
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