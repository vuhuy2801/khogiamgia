<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/discountService.php';

class Discount implements DiscountService {
    private $discountId;
    private $discountName;
    private $description;
    private $maximumDiscount;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getDiscountId() {
        return $this->discountId;
    }

    public function setDiscountId(int $discountId) {
        $this->discountId = $discountId;
    }

    public function getDiscountName() {
        return $this->discountName;
    }

    public function setDiscountName(string $discountName) {
        $this->discountName = $discountName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getMaximumDiscount() {
        return $this->maximumDiscount;
    }

    public function setMaximumDiscount(float $maximumDiscount) {
        $this->maximumDiscount = $maximumDiscount;
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

    public function List(): array {
        return [];
    }
}
?>