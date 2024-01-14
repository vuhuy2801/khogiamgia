<!DOCTYPE html>
<html>

<head>
    <title>Lịch sử giá</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/general.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/css/history-price.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
    <!-- follow price -->
    <?php
    include 'app/views/history-price/sectionFollowPrice.php';
    ?>

    <!-- notifiCation -->
    <div class="container mt-5">
        <div class="row">
            <div class="col d-none" id="notifiCation">

            </div>
        </div>
    </div>

    <!-- info product -->
    <?php
    include 'app/views/history-price/sectionInfoProduct.php';
    ?>

    <!-- advice product by ai -->
    <section class="advice-product mt-5 d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Lời khuyên cho sản phẩm</h2>
                </div>

                <!-- box content -->
                <div class="box-content col-md-12 mt-2">
                    <div class="advice-product__content">
                    </div>
                </div>

    </section>

    <?php
    require_once 'app/views/footer.php';

    ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="public\js\historyPrice.js"></script>
</body>

</html>