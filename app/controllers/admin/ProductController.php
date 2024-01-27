<?php
require_once 'app/models/ProductModel.php';
include_once 'app/controllers/admin/AdminController.php';


class ProductController extends AdminController
{
    private $productData;

    public function __construct()
    {
        $this->productData = new Product();
    }

    public function getListOfProduct($offSet, $limit)
    {
        return $this->productData->ListAdmin($offSet, $limit);
    }

    public function getDetail($id)
    {
        return $this->productData->Detail($id);
    }

    public function getPrices($id)
    {
        return $this->productData->GetProductWithPriceById($id);
    }

    public function getTotalProduct()
    {
        return $this->productData->CountProduct();
    }

    public function index()
    {
        $this->checkLogin();
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $limit = 10;
        $totalProducts = $this->getTotalProduct();
        $totalPages = ceil($totalProducts / $limit);
        if ($currentPage > $totalPages || $currentPage < 1) {
            $products = [];
            $hidePagination = true;
            include 'app/views/admin/products/show.php';
        }
        $offset = ($currentPage - 1) * $limit;
        $products = $this->getListOfProduct($offset, $limit);
        $hidePagination = $totalPages <= 1;
        include 'app/views/admin/products/show.php';
    }


    public function search()
    {
        // $this->checkLogin();
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $query = isset($_GET['q']) ? $_GET['q'] : "";
        $limit = 10;
        $totalProducts = $this->countSearchProduct($query);
        $totalPages = ceil($totalProducts / $limit);
        if ($currentPage > $totalPages || $currentPage < 1) {
            $products = [];
            $hidePagination = true;
            include 'app/views/admin/products/show.php';
        }
        $offset = ($currentPage - 1) * $limit;
        $products = $this->getResultSearch($query, $offset, $limit);
        $hidePagination = $totalPages <= 1;
        include 'app/views/admin/products/show.php';
    }

    // count search product
    public function countSearchProduct($query)
    {
        return $this->productData->CountSearchProduct($query);
    }

    public function getResultSearch($query, $offSet, $limit)
    {
        return $this->productData->SearchProductWithPagination($query, $offSet, $limit);
    }



    public function detail()
    {
        $this->checkLogin();

        $titlePage = "Chi tiết theo dõi sản phẩm";
        include 'app/views/admin/products/detail.php';

    }

    public function create()
    {
        $this->checkLogin();

        $titlePage = "Thêm theo dõi sản phẩm";
        include 'app/views/admin/products/create.php';
    }

    public function edit()
    {
        $this->checkLogin();

        $titlePage = "Sửa theo dõi sản phẩm";
        include 'app/views/admin/products/edit.php';
    }

    public function upload()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $targetDirectory = '/public/uploads/products/' . date('d-m-Y') . '/';

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


    public function add()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->productData->setProductID($_POST['productId']);
        $this->productData->setProductName($_POST['productName']);
        $this->productData->setLink($_POST['link']);
        $this->productData->setRateCount($_POST['rateCount']);
        $this->productData->setSoldCount(($_POST['soldCount']));
        $this->productData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->productData->setUpdateAt(date('Y-m-d H:i:s'));
        $this->productData->setStatus($_POST['status']);
        $imageName = ($_POST['image']);
        $targetDirectory = '/public/uploads/products/' . date('d-m-Y') . '/';
        $imageUrl = $targetDirectory . $imageName;
        $this->productData->setImage($imageUrl);

        if ($this->productData->Add()) {
            header('Location: ../theo-doi-gia-san-pham/danh-sach');
        } else {
            echo "Thêm sản phẩm theo dõi thất bại";
        }

    }

    public function update()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->productData->setProductID($_POST['productId']);
        $this->productData->setProductName($_POST['productName']);
        $this->productData->setLink($_POST['link']);
        $this->productData->setRateCount($_POST['rateCount']);
        $this->productData->setSoldCount(($_POST['soldCount']));
        $this->productData->setUpdateAt(date('Y-m-d H:i:s'));
        $this->productData->setStatus($_POST['status']);
        $imageName = ($_POST['image']);
        $imageFake = ($_POST['fakeImage']);
        if ($imageName == "") {
            $this->productData->setImage($imageFake);
        } else {
            $targetDirectory = '/public/uploads/products/' . date('d-m-Y') . '/';
            $imageUrl = $targetDirectory . $imageName;

            $this->productData->setImage($imageUrl);
        }
        if ($this->productData->Edit()) {
            header('Location: ../theo-doi-gia-san-pham/danh-sach');
        } else {
            echo "Sửa sản phẩm theo dõi thất bại";
        }

    }

    public function delete($productId)
    {
        $this->productData->setProductID($productId);
        if ($this->productData->Delete()) {
            header('Location: ../danh-sach');
        } else {
            echo "Xóa sản phẩm theo dõi thất bại";
        }

    }





}