<?php 
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/productService.php';
class Product implements ProductService{
    private $db;

    private $productID;
    private $productName;
    private $image;
    private $rateCount;
    private $link;
    private $soldCount;

    public function __construct() {
        $this->db = new DBConnection();
    }

    // Getter and Setter for $productID
    public function getProductID() {
        return $this->productID;
    }

    public function setProductID(int $productID) {
        $this->productID = $productID;
    }

    // Getter and Setter for $productName
    public function getProductName() {
        return $this->productName;
    }

    public function setProductName(string $productName) {
        $this->productName = $productName;
    }

    // Getter and Setter for $image
    public function getImage() {
        return $this->image;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    // Getter and Setter for $rateCount
    public function getRateCount() {
        return $this->rateCount;
    }

    public function setRateCount(int $rateCount) {
        $this->rateCount = $rateCount;
    }

    // Getter and Setter for $link
    public function getLink() {
        return $this->link;
    }

    public function setLink(string $link) {
        $this->link = $link;
    }

    // Getter and Setter for $soldCount
    public function getSoldCount() {
        return $this->soldCount;
    }

    public function setSoldCount(int $soldCount) {
        $this->soldCount = $soldCount;
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
    public function Search(): array{
        return [];
    }
    
    public function GetProductWithPriceByLink(): array {
        return [];

    }
}

?>