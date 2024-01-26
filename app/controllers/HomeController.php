<?php
// File: controllers/home.php
include_once 'app/models/BannerModel.php';
include_once 'app/models/SupplierModel.php';
include_once 'app/models/PostModel.php';
include_once 'app/models/VoucherModel.php';

class HomeController
{
  private $bannerModel;
  private $supplierModel;
  private $postModel;
  
  private $voucherModel;


  public function __construct()
  {
    $this->postModel = new Post();
    $this->supplierModel = new Supplier();
    $this->bannerModel = new Banner();
    $this->voucherModel = new Voucher();
  }
  public function index()
  {

    $banner = $this->getBanner();
    $supplier = $this->supplierModel->List();
    $totalPost = $this->postModel->GetTotalPost();
    $posts = $this->postModel->GetListPostSortByDate(6, 0);
    $isShowMore = $totalPost > 6;
    $vouchers = $this->voucherModel->ListUser();
    $manually = array(
      0 => "Mã có sẵn",
      1 => "Mã nhập tay"
    );

    // loop vouchers

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