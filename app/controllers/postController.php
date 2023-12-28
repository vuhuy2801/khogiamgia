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

    public function addPost($title, $image, $supplierId, $content, $description, $categories_post, $createdAt, $status) {
        $this->postData->setTitle($title);
        $this->postData->setImage($image);
        $this->postData->setSupplierId($supplierId);
        $this->postData->setContent($content);
        $this->postData->setDescription($description);
        $this->postData->setCategoriesPost($categories_post);
        $this->postData->setCreatedAt($createdAt);
        $this->postData->setStatus($status);
        return $this->postData->Add();
    }
}


?>