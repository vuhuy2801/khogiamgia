<!-- Section Posts -->
<section class="section-post" style=" padding: 35px 0px">
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
            require_once 'app/controllers/PostController.php';
            $postController = new PostController();
            $posts = $postController->getListPostsUser();
            foreach ($posts as $post) {
                $imgSrc = $post['image'];
                $postDate = $post['createdAt'];
                $postTitle = $post['title'];
                $postLink = "bai-viet/" . $post['slug'];
                $description = $post['description'];
                echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
            }
            ?>

        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="button" class="btn btn-xem-them">Xem thêm</button>
        </div>
    </div>
</section>
<!-- End Section Posts -->