<?php 
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/productPriceService.php';

class productPrice implements productPriceService {
    private $productPriceID;
    private $productID;
    private $date;
    private $currentPrice;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getProductPriceID() {
        return $this->productPriceID;
    }

    public function setProductPriceID($productPriceID) {
        $this->productPriceID = $productPriceID;
    }

    public function getProductID() {
        return $this->productID;
    }

    public function setProductID($productID) {
        $this->productID = $productID;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getCurrentPrice() {
        return $this->currentPrice;
    }

    public function setCurrentPrice($currentPrice) {
        $this->currentPrice = $currentPrice;
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
}

?>