<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/categoryService.php';

class category implements CategoryService{
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
        return true;
    }

    public function Edit(): bool {
        return true;
    }

    public function Delete(): bool {
        return true;
    }

    public function List(): array {
        return [];
    }
}
?>