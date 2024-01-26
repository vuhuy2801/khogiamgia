<?php
$router->get('/', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();
    logUserAccess();

});
$router->get('/trang-chu', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();
    logUserAccess();
});



?>