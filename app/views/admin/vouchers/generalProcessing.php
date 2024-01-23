<?php
require_once 'app/controllers/admin/SupplierController.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $currentDateTime = date('s-i-H d-m-Y'); 
 $categories = array(
      1 => "Khuyến mại",
      2 => "Hướng dẫn",
      3 => "Kinh nghiệm mua sắm" ,
      4 => "Khác" 
 );
 $statuses = array(
    0 => "Ẩn",
    1 => "Hiển thị"
);

$statusProduct = array(
    0 => "Tắt",
    1 => "Đang theo dõi"
);

$statusTwoProduct = array(
    0 => "Không theo dõi",
    1 => "Theo dõi"
);

$typeDisount = array(
    1 => "Free Ship",
    2 => "Shopee Mail",
    3 => "Nạp điện thoại");

    function convertDate($inputDate) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = strtotime($inputDate);
        return date('d/m/Y', $timestamp);
    }

    $statusVoucher = array(
        0 => "Hết hạn",
        1 => "Đang hoạt động",
        2 => "Chờ áp dụng");

 $supplierController = new SupplierController();
 $suppliers = $supplierController->getListNameSuppliers();
 $listSupplier = array();
 foreach ($suppliers as $index => $supplier) {
     $listSupplier[$supplier['supplierId']] = $supplier['supplierName'];
 }
 

?>