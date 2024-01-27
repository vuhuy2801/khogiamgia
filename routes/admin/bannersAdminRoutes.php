<?php
// Router admin handel banners
$router->get('/admin/banner/danh-sach', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->index();
});


$router->get('/admin/banner/chi-tiet', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->detail();
});

$router->get('/admin/banner/them', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->create();
});


$router->get('/admin/banner/cap-nhat', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->edit();
});


$router->post('/admin/banner/upload', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->upload();
});
$router->post('/admin/banner/add', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->add();
});

$router->post('/admin/banner/update', function () {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->update();
});

$router->post('/admin/banner/delete/(\d+)', function ($bannerId) {
    require 'app/controllers/admin/BannerController.php';
    $BannerController = new BannerController();
    $BannerController->delete($bannerId);
});

?>