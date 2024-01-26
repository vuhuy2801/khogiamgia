<?php


// router home admin
$router->get('/admin/trang-chu/show', function () {
    require 'app/controllers/admin/HomeAdminController.php';
    $HomeAdminController = new HomeAdminController();
    $HomeAdminController->index();
});

?>