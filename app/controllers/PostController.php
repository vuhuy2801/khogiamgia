<?php
require_once 'app/models/PostModel.php';


class PostController {
    private $postData;

    public function __construct() {
        $this->postData = new Post(); 
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
    public function getPostDetailBySlug($slug) {
        $post = $this->postData->GetPostDetailBySlug($slug);
        $idPost = $post['postId'];
        $title = $post['title'];
        $author = "admin";
        $date = $post['createdAt'];
        $category = $this->postData->GetCategory($post['categories_post']);
        $imageUrl = $post['image'];
        $altName = $post['title'];
        $content = $post['content'];
        include_once 'app/views/post/detail.php';
    }
}

?>