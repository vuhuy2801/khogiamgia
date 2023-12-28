<?php
require 'vendor/autoload.php';
session_start();
$router = new \Bramus\Router\Router();
$router->get('/', function () {
    echo 'Hello, world!';
});
$router->get('/ma-giam-gia', function () {
    echo 'mã giảm giá';
});
$router->run();
?>