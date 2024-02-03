<?php
require_once 'app/models/PostModel.php';
require_once 'app/models/SupplierModel.php';
require_once 'app/models/CategoryPostModel.php';
include_once 'app/controllers/admin/AdminController.php';


class PostController extends AdminController
{
    private $postData;
    private $supplierData;
    private $categoryPostData;



    public function __construct()
    {
        $this->postData = new Post();
        $this->supplierData = new Supplier();
        $this->categoryPostData = new CategoryPost();
    }

    public function index()
    {
        $this->checkLogin();
        $categories = $this->categoryPostData->List();
        $listCategoriesPost = array();
        foreach ($categories as $index => $category) {
            $listCategoriesPost[$category['categoryies_post']] = $category['categories_post_name'];
        }

        $statuses = array(
            0 => "Ẩn",
            1 => "Hiển thị"
        );
        $suppliers = $this->supplierData->ListName();
        $posts = $this->postData->List();
        require_once 'app/views/admin/posts/deleteModal.php';
        require_once 'lib/convertDate.php';
        include 'app/views/admin/posts/show.php';
    }
    public function detail()
    {
        $this->checkLogin();
        $categories = $this->categoryPostData->List();
        $listCategoriesPost = array();
        foreach ($categories as $index => $category) {
            $listCategoriesPost[$category['categoryies_post']] = $category['categories_post_name'];
        }

        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
        $post = $this->postData->getPostDetail($id);

        $statuses = array(
            0 => "Ẩn",
            1 => "Hiển thị"
        );
        $suppliers = $this->supplierData->ListName();
        $listSupplier = array();
        foreach ($suppliers as $index => $supplier) {
            $listSupplier[$supplier['supplierId']] = $supplier['supplierName'];
        }
        $titlePage = "Chi tiết bài viết";
        require_once 'app/views/admin/posts/deleteModal.php';
        require_once 'lib/convertDate.php';
        include 'app/views/admin/posts/detail.php';
    }

    public function create()
    {
        $this->checkLogin();
        $getSlug = $this->postData;
        $titlePage = "Thêm bài viết";
        $categories = $this->categoryPostData->List();
        $suppliers = $this->supplierData->ListName();
        include 'app/views/admin/posts/create.php';
    }

    public function edit()
    {
        $this->checkLogin();
        $categories = $this->categoryPostData->List();
        $suppliers = $this->supplierData->ListName();
        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
        $post = $this->postData->getPostDetail($id);

        $listCategoriesPost = array();
        foreach ($categories as $index => $category) {
            $listCategoriesPost[$category['categoryies_post']] = $category['categories_post_name'];
        }

        $statuses = array(
            0 => "Ẩn",
            1 => "Hiển thị"
        );
        $titlePage = "Sửa bài viết";
        require_once 'lib/convertDate.php';
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


    public function addPost()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->postData->setContent($_POST['content']);
        $this->postData->setTitle($_POST['title']);
        $this->postData->setDescription($_POST['description']);
        $this->postData->setSupplierId($_POST['supplierId']);
        $this->postData->setCategoriesPost($_POST['category_post']);
        $this->postData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->postData->setUpdatedAt(date('Y-m-d H:i:s'));
        $this->postData->setStatus(1);
        $this->postData->setSlug($_POST['slug']);
        $imageName = ($_POST['image']);
        $targetDirectory = '/public/uploads/posts/' . date('d-m-Y') . '/';
        $imageUrl = $targetDirectory . $imageName;
        $this->postData->setImage($imageUrl);

        if ($this->postData->Add()) {
            header('Location: ../bai-viet/danh-sach');
        } else {
            echo "Thêm bài viết thất bại";
        }
    }

    public function updatePost()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->postData->setContent($_POST['content']);
        $this->postData->setUpdatedAt(date('Y-m-d H:i:s'));
        $this->postData->setStatus($_POST['status']);
        $this->postData->setSlug($_POST['slug']);
        $this->postData->setPostId($_POST['postId']);
        $this->postData->setTitle($_POST['title']);
        $this->postData->setDescription($_POST['description']);
        $this->postData->setSupplierId($_POST['supplierId']);
        $this->postData->setCategoriesPost($_POST['category_post']);
        $imageName = ($_POST['image']);
        $imageFake = ($_POST['fakeImage']);
        if ($imageName == "") {
            $this->postData->setImage($imageFake);
        } else {
            $targetDirectory = '/public/uploads/posts/' . date('d-m-Y') . '/';
            $imageUrl = $targetDirectory . $imageName;

            $this->postData->setImage($imageUrl);
        }
        if ($this->postData->Edit()) {
            header('Location: ../bai-viet/danh-sach');
        } else {
            echo "Sửa bài viết thất bại";
        }
    }

    public function deletePost($postId)
    {
        $this->postData->setPostId($postId);
        if ($this->postData->Delete()) {
            header('Location: ../danh-sach');
        } else {
            echo "Xóa bài viết thất bại";
        }
    }
}
