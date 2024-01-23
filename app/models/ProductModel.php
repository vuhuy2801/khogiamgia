<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/productService.php';
class Product implements ProductService
{
    private $db;

    private $productID;
    private $productName;
    private $image;
    private $rateCount;
    private $createdAt;
    private $updatedAt;
    private $link;
    private $status;
    private $soldCount;


    public function __construct()
    {
        $this->db = new DBConnection();
    }

    // Getter and Setter for $productID
    public function getProductID()
    {
        return $this->productID;
    }

    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    // Getter and Setter for $productName
    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    // Getter and Setter for $image
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    // Getter and Setter for $rateCount
    public function getRateCount()
    {
        return $this->rateCount;
    }

    public function setRateCount($rateCount)
    {
        $this->rateCount = $rateCount;
    }

    // Getter and Setter for $link
    public function getLink()
    {
        return $this->link;
    }

    public function setLink(string $link)
    {
        $this->link = $link;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($value) {
        $this->createdAt = $value;
    }
    public function getUpdateAt() {
        return $this->updatedAt;
    }

    public function setUpdateAt($value) {
        $this->updatedAt = $value;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
    // Getter and Setter for $soldCount
    public function getSoldCount()
    {
        return $this->soldCount;
    }

    public function setSoldCount($soldCount)
    {
        $this->soldCount = $soldCount;
    }



    public function Add(): bool
    {
        // INSERT INTO Product (productID, productName, image, link, rateCount, soldCount, status)
        // VALUES (in_productID, in_productName, in_image, in_link, in_rateCount, in_soldCount, in_status);
        $connection = $this->db->getConnection();
        $query = "CALL AddProduct(?,?,?,?,?,?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
        $staement->bindParam(2, $this->productName);
        $staement->bindParam(3, $this->image);
        $staement->bindParam(4, $this->link);
        $staement->bindParam(5, $this->rateCount);
        $staement->bindParam(6, $this->soldCount);
        $staement->bindParam(7, $this->createdAt);
        $staement->bindParam(8, $this->updatedAt);
        $staement->bindParam(9, $this->status);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool
    {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateProduct(?,?,?,?,?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
        $staement->bindParam(2, $this->productName);
        $staement->bindParam(3, $this->image);
        $staement->bindParam(4, $this->rateCount);
        $staement->bindParam(5, $this->link);
        $staement->bindParam(6, $this->soldCount);
        $staement->bindParam(7, $this->updatedAt);
        $staement->bindParam(8, $this->status);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool
    {
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

    public function List(): array
    {
        // productID;productName;image;link;rateCount;soldCount;status
        // 22984793242;Áo Sweatshirts NEWSEVEN Striped Retro PL.276;https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lo2alcnxkeel23;https://shopee.vn/%C3%81o-Sweatshirts-NEWSEVEN-Striped-Retro-PL.276-i.257372007.22984793242;4.9;272;1

        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "select * from product";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function ListAdmin(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "CALL GetListProducts()";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function Detail($productId)
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetProductDetail(?)";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $productId);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function Search(): array
    {
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

    public function GetProductWithPriceById($id)
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetPriceById(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $id);
        try {
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }

    }
    //get limit 10 product
    public function GetLimitProduct($offSet): array
    {
        $connection = $this->db->getConnection();
        $query = "SELECT link FROM product LIMIT 10 OFFSET $offSet";
        $staement = $connection->prepare($query);
        try {
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }

    }
    //count product
    public function CountProduct(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) FROM product";
        $staement = $connection->prepare($query);
        try {
            $staement->execute();
            $result = $staement->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            return 0;
        }

    }
    //isExist
    public function isExist(): bool
    {
        $connection = $this->db->getConnection();
        // using query
        $query = "select * from product where productID = ?";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->productID);
        try {
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

}

?>