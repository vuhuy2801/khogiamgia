<!-- Section Posts -->
<section class="section-post" style=" padding: 35px; 0px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>BÀI VIẾT</h2>
                </div>
            </div>
        </div>

        <div class="row" id="postList">

            <?php
            include_once 'app/views/component/itemPost.php';
            $imgSrc = "https://api.vuhuy.site/uploads/small_img_index_73bc26433c.png";
            $postDate = "Thứ Ba, 1 tháng 8, 2023";
            $postTitle = "CUỘC THI VÔ ĐỊCH PHÁT TRIỂN WEB - WEB DEV CHAMPION 2023";
            $postLink = "new.html?slug=cuoc-thi-vo-dich-phat-trien-web-web-dev-champion-2023";
            $description = "Cùng nhau khám phá, sáng tạo và thể hiện tài năng lập trình web tại cuộc thi VÔ ĐỊCH PHÁT TRIỂN WEB - WEB DEV CHAMPION 2023, được tổ chức bởi khoa Công Nghệ Thông Tin, Đại học Công Nghệ Đông Á.";
            echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            ?>

        </div>



        <div class="d-flex justify-content-center mt-5">
            <button type="button" class="btn btn-xem-them">Xem thêm</button>
        </div>
    </div>
</section>
<!-- End Section Posts -->