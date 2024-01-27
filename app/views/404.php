<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/general.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/js/swiperjs/swiper-bundle.min.css">


    <title>404 - không tìm thấy trang</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                require_once 'app/views/header.php';
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div>
                <h1 class="text-center">404 - Không tìm thấy trang</h1>
                <div class="d-flex mt-5">
                    <a href="/" class="btn btn-outline-primary m-auto flat" style="width: 200px;">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="/public/js/jquery/jquery-3.6.3.min.js"> </script>
    <script src="/public/js/general.js"> </script>


</body>

</html>