<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/voucherService.php';
class Voucher implements VoucherService
{
    private $voucherId;
    private $voucherName;
    private $quantity;
    private $expressAt;
    private $expiresAt;
    private $minimumDiscount;
    private $conditionsOfUse;
    private $categoryId;
    private $createdAt;
    private $updatedAt;
    private $is_trend;
    private $supplierId;
    private $status;
    private $address_target;
    private $maximunDiscount;
    private $is_inWallet;
    private $discountType;
    private $db;
    public function __construct()
    {
        $this->db = new DBConnection();
    }
    public function getVoucherId()
    {
        return $this->voucherId;
    }
    public function getVoucherName()
    {
        return $this->voucherName;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getExpressAt()
    {
        return $this->expressAt;
    }
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
    public function getMinimumDiscount()
    {
        return $this->minimumDiscount;
    }
    public function getConditionsOfUse()
    {
        return $this->conditionsOfUse;
    }
    public function getCategoryId()
    {
        return $this->categoryId;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    public function getIsTrend()
    {
        return $this->is_trend;
    }
    public function getSupplierId()
    {
        return $this->supplierId;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getAddress_target()
    {
        return $this->address_target;
    }
    public function getDiscountType()
    {
        return $this->discountType;
    }
    public function getMaximunDiscount()
    {
        return $this->maximunDiscount;
    }
    public function getIs_inWallet()
    {
        return $this->is_inWallet;
    }
    public function setVoucherId($value)
    {
        $this->voucherId = $value;
    }
    public function setVoucherName($value)
    {
        $this->voucherName = $value;
    }
    public function setQuantity($value)
    {
        $this->quantity = $value;
    }

    public function setExpressAt($value)
    {
        $this->expressAt = $value;
    }

    public function setExpiresAt($value)
    {
        $this->expiresAt = $value;
    }

    public function setMinimumDiscount($value)
    {
        $this->minimumDiscount = $value;
    }

    public function setConditionsOfUse($value)
    {
        $this->conditionsOfUse = $value;
    }

    public function setCategoryId($value)
    {
        $this->categoryId = $value;
    }

    public function setCreatedAt($value)
    {
        $this->createdAt = $value;
    }

    public function setUpdatedAt($value)
    {
        $this->updatedAt = $value;
    }

    public function setIsTrend($value)
    {
        $this->is_trend = $value;
    }

    public function setSupplierId($value)
    {
        $this->supplierId = $value;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function setAddress_target($value)
    {
        $this->address_target = $value;
    }

    public function setDiscountType($value)
    {
        $this->discountType = $value;
    }
    public function setMaximunDiscount($value)
    {
        $this->maximunDiscount = $value;
    }
    public function setIs_inWallet($value)
    {
        $this->is_inWallet = $value;
    }

    public function Add(): bool
    {
        $connection = $this->db->getConnection();
        $query = "
        INSERT INTO Voucher (
            voucherId, voucherName, quantity, expressAt, expiresAt, minimumDiscount,
            conditionsOfUse, categoryId, createdAt, updatedAt, is_trend,
            supplierId, status, address_target, discountType, maximumDiscount, is_inWallet
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherId);
        $statement->bindParam(2, $this->voucherName);
        $statement->bindParam(3, $this->quantity);
        $statement->bindParam(4, $this->expressAt);
        $statement->bindParam(5, $this->expiresAt);
        $statement->bindParam(6, $this->minimumDiscount);
        $statement->bindParam(7, $this->conditionsOfUse);
        $statement->bindParam(8, $this->categoryId);
        $statement->bindParam(9, $this->createdAt);
        $statement->bindParam(10, $this->updatedAt);
        $statement->bindParam(11, $this->is_trend);
        $statement->bindParam(12, $this->supplierId);
        $statement->bindParam(13, $this->status);
        $statement->bindParam(14, $this->address_target);
        $statement->bindParam(15, $this->discountType);
        $statement->bindParam(16, $this->maximunDiscount);
        $statement->bindParam(17, $this->is_inWallet);
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
        $query = "
            UPDATE Voucher
            SET voucherName = ?,
                quantity = ?,
                expressAt = ?,
                expiresAt = ?,
                minimumDiscount = ?,
                conditionsOfUse = ?,
                categoryId = ?,
                updatedAt = ?,
                is_trend = ?,
                supplierId = ?,
                status = ?,
                address_target = ?,
                discountType = ?,
                maximumDiscount = ?, 
                is_inWallet = ?
            WHERE voucherId = ?;";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherName);
        $statement->bindParam(2, $this->quantity);
        $statement->bindParam(3, $this->expressAt);
        $statement->bindParam(4, $this->expiresAt);
        $statement->bindParam(5, $this->minimumDiscount);
        $statement->bindParam(6, $this->conditionsOfUse);
        $statement->bindParam(7, $this->categoryId);
        $statement->bindParam(8, $this->updatedAt);
        $statement->bindParam(9, $this->is_trend);
        $statement->bindParam(10, $this->supplierId);
        $statement->bindParam(11, $this->status);
        $statement->bindParam(12, $this->address_target);
        $statement->bindParam(13, $this->discountType);
        $statement->bindParam(14, $this->maximunDiscount);
        $statement->bindParam(15, $this->is_inWallet);
        $statement->bindParam(16, $this->voucherId);

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
        $query = "DELETE FROM Voucher
        WHERE voucherId = ?;";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherId);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function List(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT voucherId,voucherName,discountType,supplierId,expiresAt,status FROM Voucher;";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function ListUser(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT voucherId,voucherName,supplierId,expiresAt,discountType,maximumDiscount,minimumDiscount,quantity,categoryId,conditionsOfUse,address_target,is_inWallet FROM Voucher;";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function ListVoucherBySupplier($idSupplier): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT voucherId,voucherName,supplierId,expiresAt,discountType,maximumDiscount,minimumDiscount,quantity,categoryId,conditionsOfUse,address_target,is_inWallet FROM Voucher Where supplierId = ?;";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $idSupplier);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function Detail($voucherId)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM Voucher where voucherId = ?;";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $voucherId);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function GetTrendingVouchers(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT * FROM Voucher WHERE is_trend = 1;";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function GetVouchersBySupplierId(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = " SELECT * FROM Voucher WHERE supplierId = ?;";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $this->supplierId);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function GetVouchersByCategoryId($category, $supplierId): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT voucherId,voucherName,supplierId,expiresAt,discountType,maximumDiscount,minimumDiscount,quantity,categoryId,conditionsOfUse,address_target,is_inWallet FROM Voucher WHERE categoryId = ? and supplierId = ?;";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $category);
            $statement->bindParam(2, $supplierId);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function SearchVoucherByKeyword(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT V.*
            FROM Voucher V
            LEFT JOIN Supplier S ON V.supplierId = S.supplierId
            LEFT JOIN Category PC ON V.categoryId = PC.categoryId
            WHERE S.supplierName LIKE CONCAT('%', ?, '%')
                OR V.voucherName LIKE CONCAT('%', ?, '%')
                OR PC.categoryName LIKE CONCAT('%', ?, '%');";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $this->voucherName);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
}
