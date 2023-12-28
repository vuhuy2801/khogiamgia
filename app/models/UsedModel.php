<?php 
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/usedService.php';
class Used implements UsedService {
    private $voucherId;
    private $usedCount;
    private $usedId;
    private $db;
    public function __construct() {
        $this->db = new DBConnection();
    }
    
    public function getVoucherId(): ?int {
        return $this->voucherId;
    }

    public function setVoucherId(?int $voucherId): void {
        $this->voucherId = $voucherId;
    }

    public function getUsedCount(): ?int {
        return $this->usedCount;
    }

    public function setUsedCount(?int $usedCount): void {
        $this->usedCount = $usedCount;
    }

    public function getUsedId(): ?int {
        return $this->usedId;
    }

    public function setUsedId(?int $usedId): void {
        $this->usedId = $usedId;
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
    
    public function GetUsedAndVoucherList(): array {
        return [];

    }
}

?>