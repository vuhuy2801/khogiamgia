<?php
require_once 'app/models/SupplierModel.php';
include_once 'app/controllers/admin/AdminController.php';


class SupplierController extends AdminController{
    private $supplierData;

    public function __construct() {
        $this->supplierData = new Supplier(); 
    }

    public function getListOfSuppliers() {
        return $this->supplierData->List();
        
    }

    public function getDetail($id) {
        return $this->supplierData->Detail($id);
    }

    public function getListNameSuppliers() {
        return $this->supplierData->ListName();
        
    }

    public function index() {
        $this->checkLogin();

        $suppliers = $this->supplierData->List();
        include 'app/views/admin/suppliers/show.php';
    }
    public function create() {
        $this->checkLogin();

        $titlePage = "Thêm nhà cung cấp";
        include 'app/views/admin/suppliers/create.php';
    }
    public function detail() {
        $this->checkLogin();

        $titlePage = "Chi tiết nhà cung cấp";
        $supplierData = $this->supplierData;
        include 'app/views/admin/suppliers/detail.php';
    }
    public function edit() {
        $this->checkLogin();

        $titlePage = "Sửa nhà cung cấp";
        $supplierData = $this->supplierData;
        include 'app/views/admin/suppliers/edit.php';
    }

    public function delete($supplierId) {
        $this->supplierData->setSupplierId($supplierId);
        if ($this->supplierData->Delete()){
            header('Location: ../danh-sach');
        }else
        {
            echo "Xóa nhà cung cấp thất bại ! nhà cung cấp vẫn đang được sử dụng trong bài viết và mã giảm giá";
        }
    }


    public function upload()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $targetDirectory = 'public/uploads/suppliers/' . date('d-m-Y') . '/';
        
        $originalFileName = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME); // lấy tên file ảnh
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); //lấy đuôi file ảnh

        $newFileName = $originalFileName;
        $counter = 1;
        while (file_exists($targetDirectory . $newFileName . '.' . $extension)) {
            $newFileName = $originalFileName . '_' . $counter++;
        }

        $targetFile = $targetDirectory . $newFileName . '.' . $extension;

        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            echo "File đã được tải lên thành công.";
        } else {
            echo "Có lỗi khi tải file lên.";
        }
    }

    public function add() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->supplierData->setSupplierName($_POST['supplierName']);
        $this->supplierData->setAddress_target($_POST['link_target']);
        $this->supplierData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->supplierData->setUpdatedAt(date('Y-m-d H:i:s'));      
        $imageName = ($_POST['image']);
        $targetDirectory = '/public/uploads/suppliers/' . date('d-m-Y') . '/';
        $imageUrl = $targetDirectory . $imageName;
        $this->supplierData->setLogoSupplier($imageUrl);
    
        if ($this->supplierData->Add()){
            header('Location: ../nha-cung-cap/danh-sach');
        }else{
            echo "Thêm nhà cung cấp viết thất bại";
        }
        
    }

    public function update() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->supplierData->setSupplierId($_POST['supplierId']);
        $this->supplierData->setSupplierName($_POST['supplierName']);
        $this->supplierData->setAddress_target($_POST['link_target']);
        $this->supplierData->setUpdatedAt(date('Y-m-d H:i:s'));
        $imageName = ($_POST['image']);
        $imageFake = ($_POST['fakeImage']);
        if ($imageName == "") {
            $this->supplierData->setLogoSupplier($imageFake);
        }else { $targetDirectory = '/public/uploads/suppliers/' . date('d-m-Y') . '/';
            $imageUrl = $targetDirectory . $imageName;
            
            $this->supplierData->setLogoSupplier($imageUrl);
        }
        if ($this->supplierData->Edit()){
            header('Location: ../nha-cung-cap/danh-sach');
        }else{
            echo "Sửa nhà cung cấp thất bại";
        }
        
    }
}