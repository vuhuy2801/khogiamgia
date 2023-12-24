<?php
require_once __DIR__ . '/../models/postModel.php';


class PostController {
    private $postData;

    public function __construct() {
        $this->postData = new post(); 
    }

    public function getListOfPosts() {
        return $this->postData->List();
        
    }

    public function addPost() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $image = $_POST['imageId'];
            $supplierId = $_POST['supplierId'];
            $content = $_POST['content'];
            $categoryPost = $_POST['category_post'];
            $createdAt = date("Y-m-d H:i:s");
            $status = 1;

            $this->postData->setTitle($title);
            $this->postData->setImage($image);
            $this->postData->setSupplierId($supplierId);
            $this->postData->setContent($content);
            $this->postData->setDescription('empty');
            $this->postData->setCategoriesPost($categoryPost);
            $this->postData->setCreatedAt($createdAt);
            $this->postData->setStatus($status);

            $addPost = $this->postData->Add();

            if ($addPost) {
                header("Location:/pj_voucher/khogiamgia/app/views/posts/show.php");
                exit();
            } else {
                echo "Failed to add post!";
            }
        }
    }

    public function updatePost(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
            $postId = $_POST['postId'];
            $title = $_POST['title'];
            $image = $_POST['imageId'];
            $supplierId = $_POST['supplierId'];
            $content = $_POST['content'];
            $categoryPost = $_POST['category_post'];
            $createdAt = date("Y-m-d H:i:s");
            $status = 1;

            $this->postData->setPostId($postId);
            $this->postData->setTitle($title);
            $this->postData->setImage($image);
            $this->postData->setSupplierId($supplierId);
            $this->postData->setContent($content);
            $this->postData->setDescription('empty');
            $this->postData->setCategoriesPost($categoryPost);
            $this->postData->setCreatedAt($createdAt);
            $this->postData->setStatus($status);

            $updatePost = $this->postData->Edit();

            if ($updatePost) {
                header("Location:/pj_voucher/khogiamgia/app/views/posts/show.php");
                exit();
            } else {
                echo "Failed to update post!";
            }
        }
    }

    public function deletePost(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $request_uri = $_SERVER['REQUEST_URI'];
            $params = explode('/', $request_uri);
            $postId = end($params);
            
            $this->postData->setPostId($postId);
           
            $deletePost = $this->postData->Delete();

            if ($deletePost) {
                
                header("Location:/pj_voucher/khogiamgia/app/views/posts/show.php");
                exit();
            } else {
                echo "Failed to update post!";
            }
        }
    }

    
}


?>