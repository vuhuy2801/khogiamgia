<?php
require_once 'dbConnection.php';
require_once __DIR__ . '/interface/discountService.php';

class discount implements DiscountService {
    private $discountId;
    private $discountName;
    private $description;
    private $maximumDiscount;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getDiscountId(): int {
        return $this->discountId;
    }

    public function setDiscountId(int $discountId): void {
        $this->discountId = $discountId;
    }

    public function getDiscountName(): string {
        return $this->discountName;
    }

    public function setDiscountName(string $discountName): void {
        $this->discountName = $discountName;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getMaximumDiscount(): float {
        return $this->maximumDiscount;
    }

    public function setMaximumDiscount(float $maximumDiscount): void {
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