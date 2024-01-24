<?php
// File: controllers/home.php
include_once 'app/models/BannerModel.php';
include_once 'app/models/SupplierModel.php';

class HomeController
{
  private $bannerModel;
  private $supplierModel;


  public function __construct()
  {
    $this->supplierModel = new Supplier();
    $this->bannerModel = new Banner();
  }
  public function index()
  {
    $banner = $this->getBanner();
    $supplier = $this->supplierModel->List();
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