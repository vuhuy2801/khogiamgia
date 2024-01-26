<?php
    class GuidanceController {
        public function shopeeShow()
        {
            include 'app/views/guidance/guidanceShopee.php';
        }
        public function shopeeFoodShow()
        {
            include 'app/views/guidance/guidanceShopeeFood.php';
        }
        public function lazadaShow()
        {
            include 'app/views/guidance/guidanceLazada.php';
        }
        
    }
?>