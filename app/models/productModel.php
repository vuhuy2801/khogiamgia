<?php 
require_once 'dbConnection.php';
require_once __DIR__ . '/interface/productService.php';
class product implements ProductService{
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
    public function getProductID(): int {
        return $this->productID;
    }

    public function setProductID(int $productID): void {
        $this->productID = $productID;
    }

    // Getter and Setter for $productName
    public function getProductName(): string {
        return $this->productName;
    }

    public function setProductName(string $productName): void {
        $this->productName = $productName;
    }

    // Getter and Setter for $image
    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    // Getter and Setter for $rateCount
    public function getRateCount(): int {
        return $this->rateCount;
    }

    public function setRateCount(int $rateCount): void {
        $this->rateCount = $rateCount;
    }

    // Getter and Setter for $link
    public function getLink(): string {
        return $this->link;
    }

    public function setLink(string $link): void {
        $this->link = $link;
    }

    // Getter and Setter for $soldCount
    public function getSoldCount(): int {
        return $this->soldCount;
    }

    public function setSoldCount(int $soldCount): void {
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