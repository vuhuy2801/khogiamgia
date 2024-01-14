<?php

function itemPostBox($imgSrc, $postDate, $postTitle, $postLink, $description)
{
  
    if (strpos($imgSrc, '../../') === 0) {
        $imgSrc =  substr($imgSrc, 6); 
        if (!file_exists($imgSrc)) {
            echo "Lỗi: Tệp hình ảnh không tồn tại - $imgSrc";
        }
    }

    return '<div class="col-lg-4">
        <div class="post-box">
            <div class="post-img">
                <img src="' . $imgSrc . '" class="img-fluid" alt="small_img-index.png">
            </div>
            <p class="post-date">' . $postDate . '</p>
            <h3 class="post-title">
                <a href="' . $postLink . '">' . $postTitle . '</a>
            </h3>
            <p class="description">' . $description . '</p>
        </div>
    </div>';
}

?>