<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="public\css\home.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public\js\swiperjs\swiper-bundle.min.css">
    <link rel="stylesheet" href="public\css\promotion.css">
    <link rel="stylesheet" href="public\css\posts.css">

    <title>Trang chủ</title>
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
    <?php
    require_once 'app/views/banner.php';
    require_once 'app/views/home/sectionProvider.php';
    require_once 'app/views/home/sectionPromotion.php';
    require_once 'app/views/home/sectionPosts.php';
    require_once 'app/views/footer.php';
    ?>


    <script src="public\js\bootstrap\bootstrap.bundle.min.js">   </script>
    <script src="public\js\jquery\jquery-3.6.3.min.js">   </script>
    <script src="public\js\swiperjs\swiper-bundle.min.js">   </script>
    <script src="public\js\home.js">   </script>


</body>

</html>