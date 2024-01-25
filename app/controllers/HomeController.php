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
    $vouchers = array(
      array(
          "voucherId" => "VOUCHER0012",
          "voucherName" => "Giảm 60K",
          "quantity" => 30,
          "expressAt" => "2024-01-25",
          "expiresAt" => "2024-02-28",
          "orderConditions" => "Áp dụng cho bộ nồi đun nấu",
          "conditionsOfUse" => "Chỉ áp dụng khi mua trên 1.000.000 VNĐ",
          "categoryId" => 5,
          "createdAt" => "2024-01-04 00:00:00",
          "updatedAt" => "2024-01-08 00:00:00",
          "is_trend" => 0,
          "supplierId" => 4,
          "status" => 0,
          "address_target" => "321 Đường MNO, Hải Phòng",
          "discountType" => 2,
          "maximumDiscount" => "250.000 VNĐ",
          "is_inWallet" => 0,
      ),
      array(
          "voucherId" => "VOUCHER0045",
          "voucherName" => "Freeship",
          "quantity" => 60,
          "expressAt" => "2024-01-30",
          "expiresAt" => "2024-03-20",
          "orderConditions" => "Áp dụng cho sách giáo khoa",
          "conditionsOfUse" => "Áp dụng cho học sinh, sinh viên",
          "categoryId" => 10,
          "createdAt" => "2024-01-05 00:00:00",
          "updatedAt" => "2024-01-09 00:00:00",
          "is_trend" => 1,
          "supplierId" => 1,
          "status" => 1,
          "address_target" => "654 Đường STU, Cần Thơ",
          "discountType" => 1,
          "maximumDiscount" => "100.000 VNĐ",
          "is_inWallet" => 1,
      ),
      array(
          "voucherId" => "VOUCHER007",
          "voucherName" => "Giảm 20%",
          "quantity" => 100,
          "expressAt" => "2024-01-15",
          "expiresAt" => "2024-02-28",
          "orderConditions" => "Áp dụng cho điện thoại Samsung",
          "conditionsOfUse" => "Chỉ áp dụng khi đặt hàng online",
          "categoryId" => 1,
          "createdAt" => "2024-01-01 00:00:00",
          "updatedAt" => "2024-01-05 00:00:00",
          "is_trend" => 1,
          "supplierId" => 1,
          "status" => 1,
          "address_target" => "123 Đường ABC, TP.HCM",
          "discountType" => 1,
          "maximumDiscount" => "200.000 VNĐ",
          "is_inWallet" => 1,
      ),
      array(
          "voucherId" => "VOUCHER008",
          "voucherName" => "Giảm 50K",
          "quantity" => 50,
          "expressAt" => "2024-01-10",
          "expiresAt" => "2024-03-15",
          "orderConditions" => "Áp dụng cho laptop Asus",
          "conditionsOfUse" => "Áp dụng cho tất cả các đơn hàng",
          "categoryId" => 2,
          "createdAt" => "2024-01-02 00:00:00",
          "updatedAt" => "2024-01-06 00:00:00",
          "is_trend" => 0,
          "supplierId" => 2,
          "status" => 1,
          "address_target" => "456 Đường DEF, Hà Nội",
          "discountType" => 2,
          "maximumDiscount" => "300.000 VNĐ",
          "is_inWallet" => 0,
      ),
      array(
          "voucherId" => "VOUCHER09",
          "voucherName" => "Giảm 20K",
          "quantity" => 80,
          "expressAt" => "2024-01-20",
          "expiresAt" => "2024-03-10",
          "orderConditions" => "Áp dụng cho đồng hồ dành cho nam",
          "conditionsOfUse" => "Chỉ áp dụng khi mua trên 2 sản phẩm",
          "categoryId" => 4,
          "createdAt" => "2024-01-03 00:00:00",
          "updatedAt" => "2024-01-07 00:00:00",
          "is_trend" => 1,
          "supplierId" => 3,
          "status" => 1,
          "address_target" => "789 Đường GHI, Đà Nẵng",
          "discountType" => 1,
          "maximumDiscount" => "150.000 VNĐ",
          "is_inWallet" => 1,
      ),
  );

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