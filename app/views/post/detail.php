<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="/public/css/promotion.css">
    <link rel="stylesheet" href="/public/css/posts.css">
    <link rel="stylesheet" href="/public/css/detail-post.css">

    <title>
        <?php
        echo $title
            ?>
    </title>
</head>

<body>

    <?php
    require_once 'app/views/header.php';
    ?>
    <!-- section detail post -->
    <section class="detail-post">
        <div class="container">
            <div class="row">
                <article>
                    <header>
                        <h1>
                            <?php echo $title ?>
                        </h1>
                    </header>
                    <div class="info-post">
                        <span class="author">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg>
                            <?php echo $author ?>
                        </span>
                        <span class="post-date">
                            <?php echo $date ?>
                        </span>
                        <span class="category">
                            <?php echo $category['categoryName'] ?>
                        </span>
                    </div>
                    <div class="thumb">
                        <img src="<?php echo $imageUrl ?>" alt="<?php echo $altName ?>">
                    </div>
                    <div class="content">
                        <?php echo $content ?>
                    </div>


                </article>
            </div>
        </div>


    </section>

    <?php
    require_once 'app/views/footer.php';
    ?>


    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="/public/js/jquery/jquery-3.6.3.min.js"> </script>
    <script src="/public/js/swiperjs/swiper-bundle.min.js"> </script>
    <script src="/public/js/general.js"> </script>


</body>

</html>