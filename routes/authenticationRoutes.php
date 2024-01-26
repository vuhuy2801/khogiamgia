<?php
$router->get('/login', function () {
    require_once 'app/controllers/AuthenticationController.php';
    $AuthenticationController = new AuthenticationController();
    $AuthenticationController->loginView();
});
$router->post('/login', function () {
    require_once 'app/controllers/AuthenticationController.php';
    $AuthenticationController = new AuthenticationController();
    $AuthenticationController->handleLogin();
});
$router->get('/dang-xuat', function () {
    require_once 'app/controllers/AuthenticationController.php';
    $AuthenticationController = new AuthenticationController();
    $AuthenticationController->logout();
});

?>