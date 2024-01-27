<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/ProductPriceService.php';

class ProductPrice implements productPriceService
{
    private $productPriceID;
    private $productID;
    private $date;
    private $currentPrice;
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function getProductPriceID()
    {
        return $this->productPriceID;
    }

    public function setProductPriceID($productPriceID)
    {
        $this->productPriceID = $productPriceID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    public function Add(): bool
    {
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

    public function Edit(): bool
    {
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

    public function Delete(): bool
    {
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

    public function getHistoryPrice($productID)
    {
        // productPriceID;productID;date;currentPrice
        // 20;22984793242;2024-01-10;275000
        //sort by date limit 5

        $connection = $this->db->getConnection();
        $query = "SELECT productID, productPriceID, date, currentPrice
        FROM productprice
        WHERE productID = ?
        GROUP BY date
        ORDER BY date;
        ";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $productID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // get min price
    public function getMinPrice(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT MIN(currentPrice) AS minPrice
        FROM productprice
        WHERE productID = ?;";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
        try {
            $staement->execute();
            $result = $staement->fetch(PDO::FETCH_ASSOC);
            return $result['minPrice'];
        } catch (PDOException $e) {
            return 0;
        }
    }
    // get max price
    public function getMaxPrice(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT MAX(currentPrice) AS maxPrice
        FROM productprice
        WHERE productID = ?;";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
        try {
            $staement->execute();
            $result = $staement->fetch(PDO::FETCH_ASSOC);
            return $result['maxPrice'];
        } catch (PDOException $e) {
            return 0;
        }
    }
}

?>