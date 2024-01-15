<?php
require_once __DIR__ . '/../models/PostModel.php';


class PostController {
    private $postData;

    public function __construct() {
        $this->postData = new Post(); 
    }

    public function getListOfPosts() {
        return $this->postData->List();
        
    }
    public function getListPostsUser() {
        return $this->postData->ListUser();
        
    }

    public function getListWithSupplier($id) {
        return $this->postData->GetPostsBySupplier($id);
        
    }

    public function getListGuidanceWithSupplier($id) {
        return $this->postData->GetGuidancePostsBySupplierId($id);
        
    }
    public function getPostDetail($postId) {
        return $this->postData->GetPostDetail($postId);
    }
    public function index()
    {
      include 'app/views/admin/posts/show.php';
      
    }
    public function detail()
    {
      include 'app/views/admin/posts/detail.php';
      
    }

    public function create()
    {
      include 'app/views/admin/posts/create.php';
    }

    public function edit()
    {
        include 'app/views/admin/posts/edit.php';
    }
  
    public function upload()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $targetDirectory = 'public/uploads/posts/' . date('d-m-Y') . '/';
        
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

  
    public function addPost() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->postData->setContent($_POST['content']);
        $this->postData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->postData->setUpdateAt(date('Y-m-d H:i:s'));
        $this->postData->setStatus(1);
        $this->postData->setSlug($_POST['slug']);
        $imageName = ($_POST['image']);
        $targetDirectory = '../../public/uploads/posts/' . date('d-m-Y') . '/';
        $imageUrl = $targetDirectory . $imageName;
        $this->postData->setImage($imageUrl);
    
        if (isset($_POST['title'])) {
            $this->postData->setTitle($_POST['title']);
        }
        if (isset($_POST['description'])) {
            $this->postData->setDescription($_POST['description']);
        }
        if (isset($_POST['supplierId'])) {
            $this->postData->setSupplierId($_POST['supplierId']);
        }
        if (isset($_POST['category_post'])) {
            $this->postData->setCategoriesPost($_POST['category_post']);
        }
        if ($this->postData->Add()){
            header('Location: ../bai-viet/show');
        }else{
            echo "Thêm bài viết thất bại";
        }
        
    }

    public function updatePost() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $this->postData->setContent($_POST['content']);
        $this->postData->setUpdateAt(date('Y-m-d H:i:s'));
        $this->postData->setStatus(1);
        $this->postData->setSlug($_POST['slug']);

        $imageName = ($_POST['image']);
        $imageFake = ($_POST['fakeImage']);
        if ($imageName == "") {
            $this->postData->setImage($imageFake);
        }else { $targetDirectory = '../../public/uploads/posts/' . date('d-m-Y') . '/';
            $imageUrl = $targetDirectory . $imageName;
            
            $this->postData->setImage($imageUrl);
        }
       
        
        if (isset($_POST['postId'])) {
            $this->postData->setPostId($_POST['postId']);
        }
        if (isset($_POST['title'])) {
            $this->postData->setTitle($_POST['title']);
        }
        if (isset($_POST['description'])) {
            $this->postData->setDescription($_POST['description']);
        }
        if (isset($_POST['supplierId'])) {
            $this->postData->setSupplierId($_POST['supplierId']);
        }
        if (isset($_POST['category_post'])) {
            $this->postData->setCategoriesPost($_POST['category_post']);
        }
        if ($this->postData->Edit()){
            header('Location: ../bai-viet/show');
        }else{
            echo "Sửa bài viết thất bại";
        }
        
    }

    public function deletePost($postId) {
        $this->postData->setPostId($postId);
        if ($this->postData->Delete()){
            header('Location: ../show');
        }else{
            echo "Xóa bài viết thất bại";
        }
        
    }

    
   
 
}

?>