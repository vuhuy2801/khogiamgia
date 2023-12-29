<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/services/bannerService.php';

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
        $connection = $this->db->getConnection();
        $query = "CALL AddBanner(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->image);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateBanner(?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->bannerID);
        $staement->bindParam(2, $this->image);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteBanner(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->bannerID);
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
            $query = "CALL GetListBanners()";
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