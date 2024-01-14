<?php
require_once 'app/controllers/SupplierController.php';
 $currentDateTime = date('d-m-Y'); 
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

 $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
 $title =    isset($_GET['title']) ? htmlspecialchars($_GET['title']) : '';
 $description = isset($_GET['des']) ? htmlspecialchars($_GET['des']) : '';
 $category = isset($_GET['cate']) ? htmlspecialchars($_GET['cate']) : '';  
 $supplierid = isset($_GET['supp']) ? htmlspecialchars($_GET['supp']) : '';  
 $createdAt = isset($_GET['at']) ? htmlspecialchars($_GET['at']) : '';
 $updatedAt = isset($_GET['upat']) ? htmlspecialchars($_GET['upat']) : '';
 $content = isset($_GET['content']) ? htmlspecialchars($_GET['content']) : '';
 $slug = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : '';
 $image = isset($_GET['img']) ? htmlspecialchars($_GET['img']) : '';
 $supplierController = new SupplierController();
 $suppliers = $supplierController->getListOfSuppliers();
 $listSupplier = array();
 foreach ($suppliers as $index => $supplier) {
     $listSupplier[$supplier['supplierId']] = $supplier['supplierName'];
 }
 

?>