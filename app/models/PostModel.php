<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/services/PostService.php';


class Post implements PostService {
    private $postId;
    private $title;
    private $image;
    private $supplierId;
    private $content;
    private $description;
    private $categories_post;
    private $createdAt;
    private $status;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getPostId() {
        return $this->postId;
    }

    public function setPostId($value) {
        $this->postId=$value;
    }
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($value) {
        $this->image = $value;
    }

    public function getSupplierId() {
        return $this->supplierId;
    }

    public function setSupplierId($value) {
        $this->supplierId = $value;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($value) {
        $this->content = $value;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }

    public function getCategoriesPost() {
        return $this->categories_post;
    }

    public function setCategoriesPost($value) {
        $this->categories_post = $value;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($value) {
        $this->createdAt = $value;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($value) {
        $this->status = $value;
    }
    public function post(
        int $id,
        string $title,
        string $image,
        int $supplierId,
        string $content,
        string $description,
        string $categories_post,
        string $createdAt,
        int $status
    ) {
        $this->title = $title;
        $this->image = $image;
        $this->supplierId = $supplierId;
        $this->content = $content;
        $this->description = $description;
        $this->categories_post = $categories_post;
        $this->createdAt = $createdAt;
        $this->status = $status;
    }

    
    public function List(): array {
        $connection = $this->db->getConnection();

        if ($connection) {         
            $query = "CALL GetListPosts()"; 
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }
   
    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddPost(?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->image);
        $statement->bindParam(3, $this->supplierId);
        $statement->bindParam(4, $this->content);
        $statement->bindParam(5, $this->description);
        $statement->bindParam(6, $this->categories_post);
        $statement->bindParam(7, $this->createdAt);
        $statement->bindParam(8, $this->status);
        try {
            $statement->execute();
            return true;
        }catch (PDOException $e) {
            return false;
        }
       
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdatePost(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->postId);
        $statement->bindParam(2, $this->title);
        $statement->bindParam(3, $this->image);
        $statement->bindParam(4, $this->supplierId);
        $statement->bindParam(5, $this->content);
        $statement->bindParam(6, $this->description);
        $statement->bindParam(7, $this->categories_post);
        $statement->bindParam(8, $this->createdAt);
        $statement->bindParam(9, $this->status);
        try {
            $statement->execute();
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query =  "CALL DeletePost(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->postId);
        try {
            $statement->execute();
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }

    public function Search(): array {
        $connection = $this->db->getConnection();
        $query = "CALL SearchPostByTitle(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->title);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e) {
            return [];
        }
    }

    public function GetPostsByCategory(): array {
        $connection = $this->db->getConnection();
        $query = "CALL GetPostsByCategory(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->categories_post);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e) {
            return [];
        }
    }
}
?>