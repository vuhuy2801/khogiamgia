<?php
require 'vendor/autoload.php';
session_start();
$router = new \Bramus\Router\Router();




$router->get('/', function () {
    require 'app/controllers/HomeController.php';
    $HomeController = new HomeController();
    $HomeController->index();

});

$router->get('/test', function () {
    date_default_timezone_set('Asia/Bangkok'); // Set the time zone to UTC+7 (Asia/Bangkok)
    $date = date('Y-m-d H:i:s');
    echo $date;
    echo "<br>";
    include_once('simple_html_dom.php');
    $dom = file_get_html('https://shopee.vn/Balo-%C4%90i-H%E1%BB%8Dc-%C4%90i-Ch%C6%A1i-Nam-N%E1%BB%AF-Th%E1%BB%9Di-Trang-H%C3%A0n-Qu%E1%BB%91c-Nhi%E1%BB%81u-Ng%C4%83n-Ti%E1%BB%87n-D%E1%BB%A5ng-%C4%91%E1%BB%B1ng-v%E1%BB%ABa-laptop-15.6inch-KT105-i.1144976040.24305621990');
    $string_id = $dom->find('.ha5ReG a', 0)->href;
    echo "id:" . explode("/", $string_id)[4];
    echo "<br>";
    echo "tên sản phẩm:" . $dom->find('._5f9gl5 span', 0)->plaintext;
    echo "<br>";
    echo "giá:" . $dom->find('.TVzooJ', 0)->plaintext;
    echo "<br>";
    echo "vote rate:" . $dom->find('.sbAxkj', 0)->plaintext;
    echo "<br>";
    echo "Lượt bán:" . $dom->find('.product-review__sold-count', 0)->plaintext;
    echo "<br>";

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

$router->get('/tin-khuyen-mai', function () {
    echo 'Tin khuyến mại';
});

$router->get('/huong-dan', function () {
    echo 'Hướng dẫn';
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


// router handle Post
$router->get('/admin/bai-viet/show', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->index();
});
$router->get('/admin/bai-viet/create', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->create();
});
$router->get('/admin/bai-viet/edit', function ()  {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->edit();
});

$router->post('/admin/bai-viet/add', function () {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->addPost();
});

$router->post('/admin/bai-viet/update', function ()  {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->updatePost();
});

$router->post('/admin/bai-viet/delete/(\d+)', function ($postId)  {
    require 'app/controllers/PostController.php';
    $PostController = new PostController();
    $PostController->deletePost($postId);
});

$router->run();
?>