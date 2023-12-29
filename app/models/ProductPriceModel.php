<?php 
require_once '../config/DbConnection.php';
require_once __DIR__ . '/services/ProductPriceService.php';

class ProductPrice implements productPriceService {
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
        $connection = $this->db->getConnection();
        $query = "CALL AddProductPrice(?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->productID);
        $statement->bindParam(2, $this->date);
        $statement->bindParam(3, $this->currentPrice);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateProductPrice(?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->productPriceID);
        $statement->bindParam(2, $this->productID);
        $statement->bindParam(3, $this->date);
        $statement->bindParam(4, $this->currentPrice);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteProductPrice(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->productPriceID);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>