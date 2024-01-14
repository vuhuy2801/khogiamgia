<?php
require 'vendor/autoload.php';
session_start();
$router = new \Bramus\Router\Router();


$router->get('/all-link', function () {
    // all link of web
    echo "<a href='/'>Trang chủ</a><br>";
    echo "<a href='/test'>Test</a><br>";
    echo "<a href='/get-current-price-all-product'>Lấy giá hiện tại của tất cả sản phẩm</a><br>";
    echo "<a href='/theo-doi-gia'>Theo dõi giá</a><br>";
    echo "<a href='/trang-chu'>Trang chủ</a><br>";
    echo "<a href='/ma-giam-gia'>Mã giảm giá</a><br>";
    echo "<a href='/login'>Đăng nhập</a><br>";
    echo "<a href='/shopee'>Shopee</a><br>";
    echo "<a href='/tiki'>Tiki</a><br>";
    echo "<a href='/lazada'>Lazada</a><br>";
    echo "<a href='/tiktok-shop'>Tiktok shop</a><br>";
    echo "<a href='/theo-doi-ma-san-pham'>Theo dõi mã sản phẩm</a><br>";
    echo "<a href='/tin-khuyen-mai/shopee'>Tin khuyến mại shopee</a><br>";
    echo "<a href='/tin-khuyen-mai/tiktok'>Tin khuyến mại tiktok</a><br>";
    echo "<a href='/tin-khuyen-mai/lazada'>Tin khuyến mại lazada</a><br>";
    echo "<a href='/huong-dan/shopee'>Hướng dẫn shopee</a><br>";
    echo "<a href='/huong-dan/lazada'>Hướng dẫn lazada</a><br>";
    echo "<a href='/huong-dan/tiktokshop'>Hướng dẫn tiktokshop</a><br>";
    echo "<a href='/ma-giam-gia/nha-cung-cap'>Mã giảm giá nhà cung cấp</a><br>";
    echo "<a href='/tin-khuyen-mai/chi-tiet'>Tin khuyến mại chi tiết</a><br>";
    echo "<a href='/huong-dan/chi-tiet'>Hướng dẫn chi tiết</a><br>";
    echo "<a href='/admin/bai-viet/show'>Admin/ Bài viết/ Show</a><br>";
    echo "<a href='/admin/bai-viet/create'>Admin/ Bài viết/ Create</a><br>";
    echo "<a href='/admin/bai-viet/edit'>Admin/ Bài viết/ Edit</a><br>";
    echo "<a href='/admin/bai-viet/add'>Admin/ Bài viết/ Add</a><br>";
    echo "<a href='/admin/bai-viet/update'>Admin/ Bài viết/ Update</a><br>";
    echo "<a href='/admin/bai-viet/delete/1'>Admin/ Bài viết/ Delete</a><br>";


});

$router->get('/', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();

});

$router->get('/test', function () {
    require 'scripts\InfoProductShopee.php';
    $InfoProductShopee = new InfoProductShopee();
    // $InfoProductShopee->getCurrentPrice();
    // $InfoProductShopee->showCurrentPrice();
    $InfoProductShopee->getBasicInfo('https://shopee.vn/Chu%E1%BB%99t-kh%C3%B4ng-d%C3%A2y-Logitech-M330-Silent-Plus-Gi%E1%BA%A3m-%E1%BB%93n-USB-thu%E1%BA%ADn-tay-ph%E1%BA%A3i-PC-Laptop-i.52679373.4412815704?publish_id=&sp_atk=828ec42d-8251-40da-9482-f87f8a115128&xptdk=828ec42d-8251-40da-9482-f87f8a115128');
    $InfoProductShopee->showInFo();
});



$router->get('/get-current-price-all-product', function () {
    require 'app\controllers\ProductController.php';
    $ProductController = new ProductController();
    // $ProductController->index();
    $ProductController->getCurrentPriceAllProduct();
});


$router->get('/api/lich-su-gia', function () {
    require 'app\controllers\ProductController.php';
    $ProductController = new ProductController();
    $ProductController->getHistoryPriceProduct();
});

// api get Advice product
$router->post('/api/lay-loi-khuyen', function () {
    require 'app\controllers\ProductController.php';
    $ProductController = new ProductController();
    $ProductController->getAdviceProduct();
});

$router->get('theo-doi-gia', function () {
    require 'app\controllers\ProductController.php';
    $ProductController = new ProductController();
    $ProductController->showHistoryPriceProduct();
});





$router->get('/trang-chu', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();
});


$router->get('/ma-giam-gia', function () {
    echo 'Mã giảm giá';
});
$router->get('/login', function () {
    require 'app/views/login/login.html';
});


$router->get('/shopee', function () {
    require 'app/controllers/VoucherController.php';
    $VoucherController = new VoucherController();
    $VoucherController->showShoppee();
});

$router->get('/tiki', function () {
    echo 'tiki';
});
$router->get('/lazada', function () {
    echo 'lazada';
});
$router->get('/tiktok-shop', function () {
    echo 'tiktok-shop';
});

$router->get('/theo-doi-ma-san-pham', function () {
    echo 'Theo dõi mã sản phẩm';
});

$router->get('/tin-khuyen-mai/shopee', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->shopeeShow();
});
$router->get('/tin-khuyen-mai/tiktok', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->tiktokShow();
});
$router->get('/tin-khuyen-mai/lazada', function () {
    require 'app/controllers/NewsPromotionController.php';
    $NewsPromotionController = new NewsPromotionController();
    $NewsPromotionController->lazadaShow();
});

$router->get('/huong-dan/shopee', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->shopeeShow();
});
$router->get('/huong-dan/lazada', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->lazadaShow();
});
$router->get('/huong-dan/tiktokshop', function () {
    require 'app/controllers/GuidanceController.php';
    $GuidanceController = new GuidanceController();
    $GuidanceController->tiktokShow();
});

$router->get('/ma-giam-gia/nha-cung-cap', function () {
    echo 'Mã giảm giá/ Nhà cung cấp';
});

$router->get('/tin-khuyen-mai/chi-tiet', function () {
    echo 'Tin khuyến mại/ Chi tiết tin khuyến mại';
});

$router->get('/huong-dan/chi-tiet', function () {
    echo 'Hướng dẫn/ Chi tiết hướng dẫn';
});

// router home admin
$router->get('/admin/trang-chu/show', function () {
    require 'app/controllers/HomeAdminController.php';
    $HomeAdminController = new HomeAdminController();
    $HomeAdminController->index();
});

// router admin handle Post
$router->get('/admin/bai-viet/show', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->index();
});

$router->get('/admin/bai-viet/detail', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->detail();
});

$router->get('/admin/bai-viet/create', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->create();
});
$router->get('/admin/bai-viet/edit', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->edit();
});

$router->post('/admin/bai-viet/add', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->addPost();
});

$router->post('/admin/bai-viet/upload', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->upload();
});

$router->post('/admin/bai-viet/update', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->updatePost();
});

$router->post('/admin/bai-viet/delete/(\d+)', function ($postId) {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->deletePost($postId);
});

// Router admin handel suppliers
$router->get('/admin/nha-cung-cap/show', function () {
    require 'app/controllers/SupplierController.php';
    $SupplierController = new SupplierController();
    $SupplierController->index();
});
$router->run();
?>