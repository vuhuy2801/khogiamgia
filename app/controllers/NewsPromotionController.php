<?php
class NewsPromotionController
{
    public function shopeeShow()
    {
        include 'app/views/promotion-news/shopeeNews.php';
    }
    public function shopeeFoodShow()
    {
        include 'app/views/promotion-news/shopeeFoodNews.php';
    }
    public function lazadaShow()
    {
        include 'app/views/promotion-news/lazadaNews.php';
    }

}
?>