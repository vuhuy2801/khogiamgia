<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin khuyến mại</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/general.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/posts.css">
    <link rel="stylesheet" href="/public/css/promotion-news.css">

</head>

<body>
    <div class="wrap-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                require_once 'app/views/header.php';
                ?>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <?php
            $urlImage ='/public/images/banner/shopee.jpg';
            require_once 'app/views/promotion-news/sectionBanners.php';
            $title = 'TIN KHUYẾN MẠI SHOPEE';
            $supplierId = 1;
            require_once 'app/views/promotion-news/sectionPosts.php';
        ?>
        </div>
        <?php
        require_once 'app/views/footer.php';
    ?>
    </div>
</body>

</html>