<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/bannerService.php';

class Banner implements BannerService {
    private $bannerID;
    private $image;
    private $title;
    private $address_target;
    private $status;
    private $createdAt;
    private $updatedAt;
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getBannerID() {
        return $this->bannerID;
    }

    public function setBannerID($bannerID) {
        $this->bannerID = $bannerID;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAddressTarget() {
        return $this->address_target;
    }

    public function setAddressTarget($address_target) {
        $this->address_target = $address_target;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddBanner(?,?,?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->image);
        $staement->bindParam(2, $this->title);
        $staement->bindParam(3, $this->address_target);
        $staement->bindParam(4, $this->status);
        $staement->bindParam(5, $this->createdAt);
        $staement->bindParam(6, $this->updatedAt);
        try {
            $staement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateBanner(?,?,?,?,?,?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1, $this->bannerID);
        $staement->bindParam(2, $this->image);
        $staement->bindParam(3, $this->title);
        $staement->bindParam(4, $this->address_target);
        $staement->bindParam(5, $this->status);
        $staement->bindParam(6, $this->updatedAt);
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

    public function Detail($bannerId) {
        $connection = $this->db->getConnection();
        $query = "CALL GetDetailBanner(?)";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $bannerId, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e) {
            return false;
        }
    }
}
?>