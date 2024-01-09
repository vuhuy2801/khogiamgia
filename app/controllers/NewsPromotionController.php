<?php
    class NewsPromotionController {
        public function shopeeShow()
        {
            include 'app/views/promotion-news/shopeeNews.php';
        }
        public function tiktokShow()
        {
            include 'app/views/promotion-news/tiktokNews.php';
        }
        public function lazadaShow()
        {
            include 'app/views/promotion-news/lazadaNews.php';
        }
        
    }
?>