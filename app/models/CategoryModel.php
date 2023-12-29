<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/categoryService.php';

class Category implements CategoryService{
    private $categoryId;
    private $categoryName;
    private $description;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    // Getter and Setter for categoryId
    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    // Getter and Setter for categoryName
    public function getCategoryName() {
        return $this->categoryName;
    }

    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddCategory(?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->categoryName);
        $staement->bindParam(2, $this->description);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateCategory(?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->categoryId);
        $staement->bindParam(2, $this->categoryName);
        $staement->bindParam(3, $this->description);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteCategory(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->categoryId);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function List(): array {
        $connection = $this->db->getConnection();
        if($connection){
            $query = "CALL GetListCategories()";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return [];
        }
    }
}
?>