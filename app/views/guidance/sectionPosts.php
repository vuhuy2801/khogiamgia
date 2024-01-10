<!-- Section Posts -->
<section class="section-post" style=" padding: 35px 0px">
    <div class="container">

        <div class="row">
            <div class="col-12 mt-5">
                <div class="titlePost">
                    <h2>HƯỚNG DẪN VÀ KINH NGHIỆM MUA SẮM</h2>
                </div>
            </div>
        </div>
        <div class="row" id="postList">

            <?php
            require_once 'app/controllers/PostController.php';
            include_once 'app/views/component/itemPost.php';
           
                $postController = new PostController();
                $posts = $postController->getListGuidanceWithSupplier($supplierId);
                $postsPerPage = 5;
                $totalPosts = count($posts);
    
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $totalPages = ceil($totalPosts / $postsPerPage);
    
                $start = ($currentPage - 1) * $postsPerPage;
                $end = $start + $postsPerPage;
                $paginatedPosts = array_slice($posts, $start, $postsPerPage);
    
              
               
                foreach ($paginatedPosts as $index => $post) {
                    $imgSrc = $post['image'];
                    $postDate = $post['createdAt'];
                    $postTitle = $post['title'];
                    $postLink = "new.html?slug=" . $post['slug'];
                    $description = $post['description'];
                    echo itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description);
                }
           
           
            ?>

        </div>

        <nav class="  py-2" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link"
                        href="?page=<?php echo ($currentPage > 1) ? ($currentPage - 1) : 1; ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($currentPage == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link"
                        href="?page=<?php echo ($currentPage < $totalPages) ? ($currentPage + 1) : $totalPages; ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
<!-- End Section Posts -->