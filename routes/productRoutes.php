<?php 


$router->get('theo-doi-gia', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->showHistoryPriceProduct();
    logUserAccess();
});

$router->get('/get-current-price-product', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    // $ProductController->index();
    $ProductController->getCurrentPriceProduct();
});

$router->get('/addProduct', function () {
    require 'app/controllers/ProductController.php';
    $ProductController = new ProductController();
    $ProductController->addProduct();
});


?>