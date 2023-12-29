<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/voucherService.php';
class Voucher implements VoucherService {
    private $voucherId;
    private $voucherName;
    private $discountId;
    private $quantity;
    private $expressAt;
    private $expiresAt;
    private $conditionOrder;
    private $conditionBranch;
    private $description;
    private $categoryId;
    private $createdAt;
    private $updatedAt;
    private $is_trend;
    private $supplierId;
    private $status;
    private $address;
    private $discountType;
    private $db;
    public function __construct() {
        $this->db = new DBConnection();
    }
    public function getVoucherId() {
        return $this->voucherId;
    }
    public function getVoucherName() {
        return $this->voucherName;
    }
    public function getDiscountId() {
        return $this->discountId;
    }
    public function getQuantity() {
        return $this->quantity;
    }
    public function getExpressAt() {
        return $this->expressAt;
    }
    public function getExpiresAt() {
        return $this->expiresAt;
    }
    public function getConditionOrder() {
        return $this->conditionOrder;
    }
    public function getConditionBranch() {
        return $this->conditionBranch;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getCategoryId() {
        return $this->categoryId;
    }
    public function getCreatedAt() {
        return $this->createdAt;
    }
    public function getUpdatedAt() {
        return $this->updatedAt;
    }
    public function getIsTrend() {
        return $this->is_trend;
    }
    public function getSupplierId() {
        return $this->supplierId;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getDiscountType() {
        return $this->discountType;
    }
   
    public function setVoucherId($value) {
        $this->voucherId=$value;
    }
    public function setVoucherName($value) {
        $this->voucherName=$value;
    }
    public function setDiscountId($value) {
        $this->discountId=$value;
    }
    public function setQuantity($value) {
        $this->quantity = $value;
    }

    public function setExpressAt($value) {
        $this->expressAt = $value;
    }

    public function setExpiresAt($value) {
        $this->expiresAt = $value;
    }

    public function setConditionOrder($value) {
        $this->conditionOrder = $value;
    }

    public function setConditionBranch($value) {
        $this->conditionBranch = $value;
    }

    public function setDescription($value) {
        $this->description = $value;
    }

    public function setCategoryId($value) {
        $this->categoryId = $value;
    }

    public function setCreatedAt($value) {
        $this->createdAt = $value;
    }

    public function setUpdatedAt($value) {
        $this->updatedAt = $value;
    }

    public function setIsTrend($value) {
        $this->is_trend = $value;
    }

    public function setSupplierId($value) {
        $this->supplierId = $value;
    }

    public function setStatus($value) {
        $this->status = $value;
    }

    public function setAddress($value) {
        $this->address = $value;
    }

    public function setDiscountType($value) {
        $this->discountType = $value;
    }

    public function Add(): bool{
        $connection = $this->db->getConnection();
        $query = "CALL AddVoucher(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherName);
        $statement->bindParam(2, $this->discountId);
        $statement->bindParam(3, $this->quantity);
        $statement->bindParam(4, $this->expressAt);
        $statement->bindParam(5, $this->expiresAt);
        $statement->bindParam(6, $this->conditionOrder);
        $statement->bindParam(7, $this->conditionBranch);
        $statement->bindParam(8, $this->description);
        $statement->bindParam(9, $this->categoryId);
        $statement->bindParam(10, $this->createdAt);
        $statement->bindParam(11, $this->updatedAt);
        $statement->bindParam(12, $this->is_trend);
        $statement->bindParam(13, $this->supplierId);
        $statement->bindParam(14, $this->status);
        $statement->bindParam(15, $this->address);
        $statement->bindParam(16, $this->discountType);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function Edit(): bool{
        $connection = $this->db->getConnection();
        $query = "CALL UpdateVoucher(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherId);
        $statement->bindParam(2, $this->voucherName);
        $statement->bindParam(3, $this->discountId);
        $statement->bindParam(4, $this->quantity);
        $statement->bindParam(5, $this->expressAt);
        $statement->bindParam(6, $this->expiresAt);
        $statement->bindParam(7, $this->conditionOrder);
        $statement->bindParam(8, $this->conditionBranch);
        $statement->bindParam(9, $this->description);
        $statement->bindParam(10, $this->categoryId);
        $statement->bindParam(11, $this->createdAt);
        $statement->bindParam(12, $this->updatedAt);
        $statement->bindParam(13, $this->is_trend);
        $statement->bindParam(14, $this->supplierId);
        $statement->bindParam(15, $this->status);
        $statement->bindParam(16, $this->address);
        $statement->bindParam(17, $this->discountType);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function Delete(): bool{
        $connection = $this->db->getConnection();
        $query = "CALL DeleteVoucher(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherId);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function GetListVouchersWithDiscounts(): array{
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL GetListVouchersWithDiscounts()";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function List(): array{
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL GetListVouchers()";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function GetTrendingVouchers(): array{
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL GetTrendingVouchers(1)";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function GetVouchersBySupplierId(): array{
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL GetVouchersBySupplierId(?)";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $this->supplierId);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }

    public function GetVouchersByCategoryId(): array{
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL GetVouchersByCategoryId(?)";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $this->categoryId);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
    public function SearchVoucherAndDiscountByKeyword(): array{
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL SearchVoucherAndDiscountByKeyword(?)";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $this->voucherName);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return [];
    }
}
?>