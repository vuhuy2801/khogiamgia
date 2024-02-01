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

    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/general.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/voucher.css">

    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/js/swiperjs/swiper-bundle.min.css">
    <link rel="stylesheet" href="/public/css/promotion.css">
    <link rel="stylesheet" href="/public/css/posts.css">

    <title>Mã giảm giá shopee</title>
</head>

<body>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true"
            style="background-color: #d1e7dd; color:#0f5132;">
            <div class="d-flex">
                <div class="toast-body" id="toastContent">

                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                require_once 'app/views/header.php';
                ?>
            </div>
        </div>
    </div>
    <?php
    $titleVoucher = "DANH MỤC MÃ GIẢM GIÁ ĐỜI SỐNG SHOPEE";
    $vouchers = $vouchersShopee;
    require_once 'app/views/banner.php';
    require_once 'app/views/voucher/sectionSideBarCategori.php';
    
    require_once 'app/views/home/sectionPromotion.php';
    require_once 'app/views/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="/public/js/jquery/jquery-3.6.3.min.js"> </script>
    <script src="/public/js/swiperjs/swiper-bundle.min.js"> </script>
    <script src="/public/js/general.js"> </script>
    <script src="/public/js/voucher.js"> </script>


</body>

</html>