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

 $supplierController = new SupplierController();
 $suppliers = $supplierController->getListNameSuppliers();
 $listSupplier = array();
 foreach ($suppliers as $index => $supplier) {
     $listSupplier[$supplier['supplierId']] = $supplier['supplierName'];
 }
 

?>