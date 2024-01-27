<?php
require 'vendor/autoload.php';
require_once 'app/controllers/StatisticController.php';
session_start();
$router = new \Bramus\Router\Router();

function logUserAccess()
{
    $statisticController = new StatisticController();
    $statisticController->logUserAccess();

}

// routes admin 
require_once 'routes/admin/homeAdminRoutes.php';
require_once 'routes/admin/bannersAdminRoutes.php';
require_once 'routes/admin/postAdminRoutes.php';
require_once 'routes/admin/productAdminRoutes.php';
require_once 'routes/admin/statisticAdminRoutes.php';
require_once 'routes/admin/suppliersAdminRoutes.php';
require_once 'routes/admin/voucherAdminRoutes.php';

// routes client
require_once 'routes/apiRoutes.php';
require_once 'routes/authenticationRoutes.php';
require_once 'routes/homeRoutes.php';
require_once 'routes/postRoutes.php';
require_once 'routes/productRoutes.php';
require_once 'routes/voucherRoutes.php';


// 404 
$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    include 'app/views/404.php';
});

$router->run();
