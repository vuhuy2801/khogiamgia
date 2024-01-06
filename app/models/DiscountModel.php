<?php
require_once __DIR__ . '/../config/DbConnection.php';
require_once __DIR__ . '/services/discountService.php';

class Discount implements DiscountService {
    private $discountId;
    private $discountValue;
    private $description;
    private $maximumDiscount;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getDiscountId() {
        return $this->discountId;
    }

    public function setDiscountId($discountId) {
        $this->discountId = $discountId;
    }

    public function getDiscountValue() {
        return $this->discountValue;
    }

    public function setDiscountValue($discountValue) {
        $this->discountValue = $discountValue;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getMaximumDiscount() {
        return $this->maximumDiscount;
    }

    public function setMaximumDiscount($maximumDiscount) {
        $this->maximumDiscount = $maximumDiscount;
    }

    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddDiscount(?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->discountValue);
        $staement->bindParam(2, $this->description);
        $staement->bindParam(3, $this->maximumDiscount);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateDiscount(?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->discountId);
        $staement->bindParam(2, $this->discountValue);
        $staement->bindParam(3, $this->description);
        $staement->bindParam(4, $this->maximumDiscount);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteDiscount(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->discountId);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function List(): array {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "CALL GetListDiscounts()";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }
}
?>