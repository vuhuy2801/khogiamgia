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

    public function index()
    {
      include 'app/views/posts/show.php';
      
    }

    public function create()
    {
      include 'app/views/posts/create.php';
    }

    public function edit()
    {
        include 'app/views/posts/edit.php';
    }
  

    function createSlug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
  
    public function addPost() {
        $slug = $this->createSlug($_POST['title']);
        $this->postData->setSlug($slug);
        $this->postData->setContent('');
        $this->postData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->postData->setUpdateAt(date('Y-m-d H:i:s'));
        $this->postData->setStatus(1);
        if (isset($_POST['title'])) {
            $this->postData->setTitle($_POST['title']);
        }
        if (isset($_POST['image'])) {
            $this->postData->setImage($_POST['image']);
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
        $slug = $this->createSlug($_POST['title']);
        $this->postData->setSlug($slug);
        $this->postData->setContent('');
        $this->postData->setUpdateAt(date('Y-m-d H:i:s'));
        $this->postData->setStatus($_POST['status']);
        if (isset($_POST['postId'])) {
            $this->postData->setPostId($_POST['postId']);
        }
        if (isset($_POST['title'])) {
            $this->postData->setTitle($_POST['title']);
        }
        if (isset($_POST['image'])) {
            $this->postData->setImage($_POST['image']);
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
            echo "Sửa bài viết thất bại";
        }
        
    }
}


?>