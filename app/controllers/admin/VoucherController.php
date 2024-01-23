<?php
require_once 'app/models/VoucherModel.php';


class VoucherController {
    private $voucherData;

    public function __construct() {
        $this->voucherData = new Voucher(); 
    }

    public function getListOfVoucher() {
        return $this->voucherData->List();
    }

    // public function getDetail($id) {
    //     return $this->voucherData->Detail($id);
    // }

    // public function getPrices($id) {
    //     return $this->voucherData->GetProductWithPriceById($id);
    // }
   
    public function index()
    {
      include 'app/views/admin/vouchers/show.php';
      
    }
    // public function detail()
    // {
    //   include 'app/views/admin/products/detail.php';
      
    // }

    // public function create()
    // {
    //   include 'app/views/admin/products/create.php';
    // }

    // public function edit()
    // {
    //     include 'app/views/admin/products/edit.php';
    // }
  
    // public function upload()
    // {
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');

    //     $targetDirectory = 'public/uploads/products/' . date('d-m-Y') . '/';
        
    //     $originalFileName = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME); // lấy tên file ảnh
    //     $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); //lấy đuôi file ảnh

    //     $newFileName = $originalFileName;
    //     $counter = 1;
    //     while (file_exists($targetDirectory . $newFileName . '.' . $extension)) {
    //         $newFileName = $originalFileName . '_' . $counter++;
    //     }

    //     $targetFile = $targetDirectory . $newFileName . '.' . $extension;

    //     if (!file_exists($targetDirectory)) {
    //         mkdir($targetDirectory, 0777, true);
    //     }
        
    //     if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
    //         echo "File đã được tải lên thành công.";
    //     } else {
    //         echo "Có lỗi khi tải file lên.";
    //     }
    // }

  
    // public function add() {
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');
    //     $this->voucherData->setProductID($_POST['productId']);
    //     $this->voucherData->setProductName($_POST['productName']);
    //     $this->voucherData->setLink($_POST['link']);
    //     $this->voucherData->setRateCount($_POST['rateCount']);
    //     $this->voucherData->setSoldCount(date($_POST['soldCount']));
    //     $this->voucherData->setCreatedAt(date('Y-m-d H:i:s'));
    //     $this->voucherData->setUpdateAt(date('Y-m-d H:i:s'));
    //     $this->voucherData->setStatus($_POST['status']);
    //     $imageName = ($_POST['image']);
    //     $targetDirectory = '/public/uploads/products/' . date('d-m-Y') . '/';
    //     $imageUrl = $targetDirectory . $imageName;
    //     $this->voucherData->setImage($imageUrl);
    
    //     if ($this->voucherData->Add()){
    //         header('Location: ../theo-doi-gia-san-pham/show');
    //     }else{
    //         echo "Thêm sản phẩm theo dõi thất bại";
    //     }
        
    // }

    // public function update() {
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');
    //     $this->voucherData->setProductID($_POST['productId']);
    //     $this->voucherData->setProductName($_POST['productName']);
    //     $this->voucherData->setLink($_POST['link']);
    //     $this->voucherData->setRateCount($_POST['rateCount']);
    //     $this->voucherData->setSoldCount(date($_POST['soldCount']));
    //     $this->voucherData->setUpdateAt(date('Y-m-d H:i:s'));
    //     $this->voucherData->setStatus($_POST['status']);
    //     $imageName = ($_POST['image']);
    //     $imageFake = ($_POST['fakeImage']);
    //     if ($imageName == "") {
    //         $this->voucherData->setImage($imageFake);
    //     }else { $targetDirectory = '/public/uploads/products/' . date('d-m-Y') . '/';
    //         $imageUrl = $targetDirectory . $imageName;
            
    //         $this->voucherData->setImage($imageUrl);
    //     }
    //     if ($this->voucherData->Edit()){
    //         header('Location: ../theo-doi-gia-san-pham/show');
    //     }else{
    //         echo "Sửa sản phẩm theo dõi thất bại";
    //     }
        
    // }

    // public function delete($productId) {
    //     $this->voucherData->setProductID($productId);
    //     if ($this->voucherData->Delete()){
    //         header('Location: ../show');
    //     }else{
    //         echo "Xóa sản phẩm theo dõi thất bại";
    //     }
        
    // }

    
   
 
}