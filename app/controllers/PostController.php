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

}

?>