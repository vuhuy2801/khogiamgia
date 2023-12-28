<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/bannerService.php';

class banner implements BannerService {
    private $bannerID;
    private $image;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getBannerID(): int {
        return $this->bannerID;
    }

    public function setBannerID(int $bannerID): void {
        $this->bannerID = $bannerID;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
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