<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/bannerService.php';

class Banner implements BannerService {
    private $bannerID;
    private $image;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getBannerID() {
        return $this->bannerID;
    }

    public function setBannerID(int $bannerID) {
        $this->bannerID = $bannerID;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage(string $image) {
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