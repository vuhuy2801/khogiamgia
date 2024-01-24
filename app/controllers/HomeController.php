<?php
// File: controllers/home.php
include_once 'app/models/BannerModel.php';
include_once 'app/models/SupplierModel.php';
include_once 'app/models/PostModel.php';

class HomeController
{
  private $bannerModel;
  private $supplierModel;
  private $postModel;


  public function __construct()
  {
    $this->postModel = new Post();
    $this->supplierModel = new Supplier();
    $this->bannerModel = new Banner();
  }
  public function index()
  {

    $banner = $this->getBanner();
    $supplier = $this->supplierModel->List();
    $totalPost = $this->postModel->GetTotalPost();
    $posts = $this->postModel->GetListPostSortByDate(6, 0);
    $isShowMore = $totalPost > 6;

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