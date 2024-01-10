<?php
    class GuidanceController {
        public function shopeeShow()
        {
            include 'app/views/guidance/guidanceShopee.php';
        }
        public function tiktokShow()
        {
            include 'app/views/guidance/guidanceTiktok.php';
        }
        public function lazadaShow()
        {
            include 'app/views/guidance/guidanceLazada.php';
        }
        
    }
?>