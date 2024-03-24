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

    public function checkData($data)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                throw new Exception("The value for '{$key}' cannot be empty");
            }
        }
    }



    public function addVoucher(Voucher $voucher): bool
    {
        $this->checkData((array)$voucher);
        if ($voucher === null) {
            throw new InvalidArgumentException("Voucher object cannot be null.");
        }
        if ($voucher->getExpiresAt() <= $voucher->getCreatedAt()) {
            throw new InvalidArgumentException("Expiration date must be greater than creation date.");
        }
        $existingVoucherId = $this->checkExistingVoucherId($voucher->getVoucherId());
        if ($existingVoucherId) {
            throw new RuntimeException("VoucherId already exists in the database.");
        }

        $connection = $this->db->getConnection();
        $query = "
            INSERT INTO Voucher (
                voucherId, voucherName, quantity, expressAt, expiresAt, minimumDiscount,
                conditionsOfUse, categoryId, createdAt, updatedAt, is_trend,
                supplierId, status, address_target, discountType, maximumDiscount, is_inWallet
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $statement = $connection->prepare($query);
        $statement->bindValue(1, $voucher->getVoucherId());
        $statement->bindValue(2, $voucher->getVoucherName());
        $statement->bindValue(3, $voucher->getQuantity());
        $statement->bindValue(4, $voucher->getExpressAt());
        $statement->bindValue(5, $voucher->getExpiresAt());
        $statement->bindValue(6, $voucher->getMinimumDiscount());
        $statement->bindValue(7, $voucher->getConditionsOfUse());
        $statement->bindValue(8, $voucher->getCategoryId());
        $statement->bindValue(9, $voucher->getCreatedAt());
        $statement->bindValue(10, $voucher->getUpdatedAt());
        $statement->bindValue(11, $voucher->getIsTrend());
        $statement->bindValue(12, $voucher->getSupplierId());
        $statement->bindValue(13, $voucher->getStatus());
        $statement->bindValue(14, $voucher->getAddress_target());
        $statement->bindValue(15, $voucher->getDiscountType());
        $statement->bindValue(16, $voucher->getMaximunDiscount());
        $statement->bindValue(17, $voucher->getIs_inWallet());

        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateVoucher(Voucher $voucher): bool
    {
        $this->checkData((array)$voucher);
        if ($voucher === null) {
            throw new InvalidArgumentException("Voucher object cannot be null.");
        }
        if ($voucher->getExpiresAt() <= $voucher->getCreatedAt()) {
            throw new InvalidArgumentException("Expiration date must be greater than creation date.");
        }
        $existingVoucherId = $this->checkExistingVoucherId($voucher->getVoucherId());
        if (!$existingVoucherId) {
            throw new RuntimeException("VoucherId does not exist in the database.");
        }
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
        $statement->bindValue(1, $voucher->getVoucherName());
        $statement->bindValue(2, $voucher->getQuantity());
        $statement->bindValue(3, $voucher->getExpressAt());
        $statement->bindValue(4, $voucher->getExpiresAt());
        $statement->bindValue(5, $voucher->getMinimumDiscount());
        $statement->bindValue(6, $voucher->getConditionsOfUse());
        $statement->bindValue(7, $voucher->getCategoryId());
        $statement->bindValue(8, $voucher->getUpdatedAt());
        $statement->bindValue(9, $voucher->getIsTrend());
        $statement->bindValue(10, $voucher->getSupplierId());
        $statement->bindValue(11, $voucher->getStatus());
        $statement->bindValue(12, $voucher->getAddress_target());
        $statement->bindValue(13, $voucher->getDiscountType());
        $statement->bindValue(14, $voucher->getMaximunDiscount());
        $statement->bindValue(15, $voucher->getIs_inWallet());
        $statement->bindValue(16, $voucher->getVoucherId());

        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function deleteVoucher($voucherId): bool
    {
        if (empty($voucherId)) {
            throw new InvalidArgumentException("VoucherId empty or null.");
        }
        if (!$this->checkExistingVoucherId($voucherId)) {
            throw new InvalidArgumentException("VoucherId does not exist in the database.");
        }
        $connection = $this->db->getConnection();
        $query = "DELETE FROM Voucher WHERE voucherId = ?;";
        $statement = $connection->prepare($query);
        $statement->bindValue(1, $voucherId);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function getListVoucherByAdmin(): array
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

    public function getListVoucherByUser(): array
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

    public function getListVoucherBySupplier($idSupplier): array
    {
        if (empty($idSupplier)) {
            throw new InvalidArgumentException("idSupplier cannot be empty or null.");
        }
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT voucherId,voucherName,supplierId,expiresAt,discountType,maximumDiscount,minimumDiscount,quantity,categoryId,conditionsOfUse,address_target,is_inWallet FROM Voucher Where supplierId = ?;";
            $statement = $connection->prepare($query);
            $statement->bindValue(1, $idSupplier);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function getVoucherDetail($voucherId)
    {
        if (empty($voucherId)) {
            throw new InvalidArgumentException("VoucherId empty or null.");
        }
        if (!$this->checkExistingVoucherId($voucherId)) {
            throw new InvalidArgumentException("VoucherId does not exist in the database.");
        }
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM Voucher where voucherId = ?;";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $voucherId);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
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
 
    public function getVouchersByCategoryId($category, $supplierId): array
    {
        if (!is_int($category) || !is_int($supplierId)) {
            throw new InvalidArgumentException("Category and supplierId must be integers.");
        }

        if ($category <= 0 || $supplierId <= 0) {
            throw new InvalidArgumentException("Category and supplierId must be positive integers.");
        }
        if (empty($category) || empty($supplierId)) {
            throw new InvalidArgumentException("Category and supplierId must not be empty.");
        }
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


    private function checkExistingVoucherId($voucherId): bool
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) FROM Voucher WHERE voucherId = ?";
        $statement = $connection->prepare($query);
        $statement->bindValue(1, $voucherId);
        $statement->execute();
        $count = $statement->fetchColumn();
        return $count > 0;
    }
}