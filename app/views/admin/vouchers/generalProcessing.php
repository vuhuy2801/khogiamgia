<?php
require_once 'app/controllers/admin/SupplierController.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $currentDateTime = date('s-i-H d-m-Y'); 

 $statuses = array(
    0 => "Ẩn",
    1 => "Hiển thị"
);


$statusTwoProduct = array(
    0 => "Không theo dõi",
    1 => "Theo dõi"
);

$typeDisount = array(
    1 => "Free Ship",
    2 => "Shopee Mail",
    3 => "Nạp điện thoại",
    4 => "Khác"
);

$yesOrNo = array(
    0 => "Không",
    1 => "Có");
    

    function convertDate($inputDate) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = strtotime($inputDate);
        return date('d/m/Y', $timestamp);
    }

    $statusVoucher = array(
        0 => "Hết hạn",
        1 => "Đang hoạt động",
        2 => "Chờ áp dụng");


 $listSupplier = array();
 foreach ($suppliers as $index => $supplier) {
     $listSupplier[$supplier['supplierId']] = $supplier['supplierName'];
 }
 
 $listCategory = array();
 foreach ($categories as $index => $category) {
     $listCategory[$category['categoryId']] = $category['categoryName'];
 }
 

?>