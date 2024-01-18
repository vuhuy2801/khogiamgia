<?php 
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/usedService.php';
class Used implements UsedService {
    private $voucherId;
    private $usedCount;
    private $usedId;
    private $db;
    public function __construct() {
        $this->db = new DBConnection();
    }
    
    public function getVoucherId() {
        return $this->voucherId;
    }

    public function setVoucherId($voucherId) {
        $this->voucherId = $voucherId;
    }

    public function getUsedCount() {
        return $this->usedCount;
    }

    public function setUsedCount($usedCount) {
        $this->usedCount = $usedCount;
    }

    public function getUsedId() {
        return $this->usedId;
    }

    public function setUsedId($usedId) {
        $this->usedId = $usedId;
    }

    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddUsed(?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->voucherId);
        $statement->bindParam(2, $this->usedCount);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateUsed(?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->usedId);
        $statement->bindParam(2, $this->voucherId);
        $statement->bindParam(3, $this->usedCount);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteUsed(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->usedId);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function List(): array {
        $connection = $this->db->getConnection();
        $query = "CALL GetListUsed()";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function GetUsedAndVoucherList(): array {
        $connection = $this->db->getConnection();
        $query = "CALL GetUsedAndVoucherList()";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }

    }
}

?>