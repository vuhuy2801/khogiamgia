<?php
// File: controllers/home.php
include_once 'app/models/BannerModel.php';

class HomeController
{
  private $bannerModel;

  public function __construct()
  {
    $this->bannerModel = new Banner();
  }
  public function index()
  {
    $banner = $this->getBanner();
    include 'app/views/home/index.php';

  }
  public function getBanner()
  {
    return $this->bannerModel->List();
  }

  public function maGiamGia()
  {
    echo 'Mã giảm giá';
  }



}


?>