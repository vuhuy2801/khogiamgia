<?php
// File: controllers/home.php

class HomeController
{
    public function index()
    {
      include 'app/views/home/index.php';
      
    }

    public function maGiamGia()
    {
        echo 'Mã giảm giá';
    }
}


?>