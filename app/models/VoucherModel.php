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
        return true;
    }
    public function Edit(): bool{
        return true;
    }
    public function Delete(): bool{
        return true;
    }
    public function Search(): array{
        return [];
    }
    public function List(): array{
        return [];
    }
}
?>