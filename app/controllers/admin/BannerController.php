<?php
require_once 'app/models/BannerModel.php';

class BannerController {
    private $bannerData;

    public function __construct() {
        $this->bannerData = new Banner(); 
    }

    public function getListOfBanners() {
        return $this->bannerData->List();
        
    }

    public function getDetail($id) {
        return $this->bannerData->Detail($id);
    }

    public function index() {
        include 'app/views/admin/banners/show.php';
    }
    public function create() {
        include 'app/views/admin/banners/create.php';
    }
    public function detail() {
        include 'app/views/admin/banners/detail.php';
    }
    public function edit() {
        include 'app/views/admin/banners/edit.php';
    }

    public function delete($bannerId) {
        $this->bannerData->setBannerID($bannerId);
        if ($this->bannerData->Delete()){
            header('Location: ../show');
        }else
        {
            echo "Xóa banner thất bại !";
        }
    }


    public function upload()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $targetDirectory = 'public/uploads/banners/' . date('d-m-Y') . '/';
        
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
        $this->bannerData->setAddressTarget($_POST['address_target']);
        $this->bannerData->setTitle($_POST['title']);
        $this->bannerData->setStatus(1);
        $this->bannerData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->bannerData->setUpdatedAt(date('Y-m-d H:i:s'));      
        $imageName = ($_POST['image']);
        $targetDirectory = '/public/uploads/banners/' . date('d-m-Y') . '/';
        $imageUrl = $targetDirectory . $imageName;
        $this->bannerData->setImage($imageUrl);
    
        if ($this->bannerData->Add()){
            header('Location: ../banner/show');
        }else{
            echo "Thêm banner thất bại";
        }
        
    }

    public function update() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->bannerData->setBannerID($_POST['bannerId']);
        $this->bannerData->setAddressTarget($_POST['address_target']);
        $this->bannerData->setTitle($_POST['title']);
        $this->bannerData->setStatus(1);
        $this->bannerData->setUpdatedAt(date('Y-m-d H:i:s'));    
        $imageName = ($_POST['image']);
        $imageFake = ($_POST['fakeImage']);
        if ($imageName == "") {
            $this->bannerData->setImage($imageFake);
        }else { $targetDirectory = '/public/uploads/banners/' . date('d-m-Y') . '/';
            $imageUrl = $targetDirectory . $imageName;
            
            $this->bannerData->setImage($imageUrl);
        }
        if ($this->bannerData->Edit()){
            header('Location: ../banner/show');
        }else{
            echo "Sửa nhà cung cấp thất bại";
        }
        
    }
}