<?php 
require_once __DIR__ . '/../config/DbConnection.php';
require_once __DIR__ . '/interfaces/productService.php';
class Product implements ProductService{
    private $db;

    private $productID;
    private $productName;
    private $image;
    private $rateCount;
    private $link;
    private $status;
    private $soldCount;

    public function __construct() {
        $this->db = new DBConnection();
    }

    // Getter and Setter for $productID
    public function getProductID() {
        return $this->productID;
    }

    public function setProductID($productID) {
        $this->productID = $productID;
    }

    // Getter and Setter for $productName
    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    // Getter and Setter for $image
    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    // Getter and Setter for $rateCount
    public function getRateCount() {
        return $this->rateCount;
    }

    public function setRateCount($rateCount) {
        $this->rateCount = $rateCount;
    }

    // Getter and Setter for $link
    public function getLink() {
        return $this->link;
    }

    public function setLink(string $link) {
        $this->link = $link;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    // Getter and Setter for $soldCount
    public function getSoldCount() {
        return $this->soldCount;
    }

    public function setSoldCount($soldCount) {
        $this->soldCount = $soldCount;
    }

    

    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddProduct(?,?,?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productName);
        $staement->bindParam(2, $this->image);
        $staement->bindParam(3, $this->rateCount);
        $staement->bindParam(4, $this->link);
        $staement->bindParam(5, $this->soldCount);
        $staement->bindParam(6, $this->status);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateProduct(?,?,?,?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
        $staement->bindParam(2, $this->productName);
        $staement->bindParam(3, $this->image);
        $staement->bindParam(4, $this->rateCount);
        $staement->bindParam(5, $this->link);
        $staement->bindParam(6, $this->soldCount);
        $staement->bindParam(7, $this->status);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteProduct(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
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
            $query = "CALL GetListProducts()";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function Search(): array{
        $connection = $this->db->getConnection();
        $query = "CALL SearchProduct(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productName);
        try {
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public function GetProductWithPriceByLink(): array {
        $connection = $this->db->getConnection();
        $query = "CALL GetProductWithPriceByLink(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->link);
        try {
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }

    }
}

?>