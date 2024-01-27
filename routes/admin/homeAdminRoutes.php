<?php


// router home admin
$router->get('/admin/trang-chu/kho-giam-gia', function () {
    require 'app/controllers/admin/HomeAdminController.php';
    $HomeAdminController = new HomeAdminController();
    $HomeAdminController->index();
});

?>