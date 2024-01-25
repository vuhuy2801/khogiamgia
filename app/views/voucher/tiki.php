<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/general.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/voucher.css">

    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/js/swiperjs/swiper-bundle.min.css">
    <link rel="stylesheet" href="public/css/promotion.css">
    <link rel="stylesheet" href="public/css/posts.css">

    <title>Mã giảm giá tiki</title>
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
    <section class="banner">
        <div class="container" data-aos="fade-up">
            <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">

                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 0"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <a href="#" target="_blank">
                            <img src="/public/images/banner/tiki-banner.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php
    $titleVoucher = "MÃ GIẢM GIÁ TIKI";
    $vouchers = array(
        array(
            "voucherId" => "VOUCHER0012",
            "voucherName" => "Giảm 60K",
            "quantity" => 30,
            "expressAt" => "2024-01-25",
            "expiresAt" => "2024-02-28",
            "orderConditions" => "Áp dụng cho bộ nồi đun nấu",
            "conditionsOfUse" => "Chỉ áp dụng khi mua trên 1.000.000 VNĐ",
            "categoryId" => 5,
            "createdAt" => "2024-01-04 00:00:00",
            "updatedAt" => "2024-01-08 00:00:00",
            "is_trend" => 0,
            "supplierId" => 4,
            "status" => 0,
            "address_target" => "321 Đường MNO, Hải Phòng",
            "discountType" => 2,
            "maximumDiscount" => "250.000 VNĐ",
            "is_inWallet" => 0,
        ),
        array(
            "voucherId" => "VOUCHER0045",
            "voucherName" => "Freeship",
            "quantity" => 60,
            "expressAt" => "2024-01-30",
            "expiresAt" => "2024-03-20",
            "orderConditions" => "Áp dụng cho sách giáo khoa",
            "conditionsOfUse" => "Áp dụng cho học sinh, sinh viên",
            "categoryId" => 10,
            "createdAt" => "2024-01-05 00:00:00",
            "updatedAt" => "2024-01-09 00:00:00",
            "is_trend" => 1,
            "supplierId" => 1,
            "status" => 1,
            "address_target" => "654 Đường STU, Cần Thơ",
            "discountType" => 1,
            "maximumDiscount" => "100.000 VNĐ",
            "is_inWallet" => 1,
        ),
        array(
            "voucherId" => "VOUCHER007",
            "voucherName" => "Giảm 20%",
            "quantity" => 100,
            "expressAt" => "2024-01-15",
            "expiresAt" => "2024-02-28",
            "orderConditions" => "Áp dụng cho điện thoại Samsung",
            "conditionsOfUse" => "Chỉ áp dụng khi đặt hàng online",
            "categoryId" => 1,
            "createdAt" => "2024-01-01 00:00:00",
            "updatedAt" => "2024-01-05 00:00:00",
            "is_trend" => 1,
            "supplierId" => 1,
            "status" => 1,
            "address_target" => "123 Đường ABC, TP.HCM",
            "discountType" => 1,
            "maximumDiscount" => "200.000 VNĐ",
            "is_inWallet" => 1,
        ),
        array(
            "voucherId" => "VOUCHER008",
            "voucherName" => "Giảm 50K",
            "quantity" => 50,
            "expressAt" => "2024-01-10",
            "expiresAt" => "2024-03-15",
            "orderConditions" => "Áp dụng cho laptop Asus",
            "conditionsOfUse" => "Áp dụng cho tất cả các đơn hàng",
            "categoryId" => 2,
            "createdAt" => "2024-01-02 00:00:00",
            "updatedAt" => "2024-01-06 00:00:00",
            "is_trend" => 0,
            "supplierId" => 2,
            "status" => 1,
            "address_target" => "456 Đường DEF, Hà Nội",
            "discountType" => 2,
            "maximumDiscount" => "300.000 VNĐ",
            "is_inWallet" => 0,
        ),
        array(
            "voucherId" => "VOUCHER09",
            "voucherName" => "Giảm 20K",
            "quantity" => 80,
            "expressAt" => "2024-01-20",
            "expiresAt" => "2024-03-10",
            "orderConditions" => "Áp dụng cho đồng hồ dành cho nam",
            "conditionsOfUse" => "Chỉ áp dụng khi mua trên 2 sản phẩm",
            "categoryId" => 4,
            "createdAt" => "2024-01-03 00:00:00",
            "updatedAt" => "2024-01-07 00:00:00",
            "is_trend" => 1,
            "supplierId" => 3,
            "status" => 1,
            "address_target" => "789 Đường GHI, Đà Nẵng",
            "discountType" => 1,
            "maximumDiscount" => "150.000 VNĐ",
            "is_inWallet" => 1,
        ),
    );
    require_once 'app/views/home/sectionPromotion.php';
    
    // require_once 'app/views/home/sectionPosts.php';
    // require_once 'app/views/voucher/sectionHelpVoucher.php';
    require_once 'app/views/voucher/sectionHelpLazada.php';
    require_once 'app/views/footer.php';
    ?>


    <script src="public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="public/js/jquery/jquery-3.6.3.min.js"> </script>
    <script src="public/js/swiperjs/swiper-bundle.min.js"> </script>
    <script src="public/js/voucher.js"> </script>


</body>

</html>