<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/supplierService.php';

class Supplier implements SupplierService {
    private $supplierId;
    private $supplierName;
    private $address_target;
    private $logoSupplier; 
    private $createdAt; 
    private $updatedAt; 
    private $db;
    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getSupplierId() {
        return $this->supplierId;
    }
    public function getSupplierName() {
        return $this->supplierName;
    }
    public function getAddress_target() {
        return $this->address_target;
    }
    public function getLogoSupplier() {
        return $this->logoSupplier;
    }
    public function setSupplierId($value) {
        $this->supplierId=$value;
    }
    public function setSupplierName($value) {
        $this->supplierName=$value;
    }
    public function setAddress_target($value) {
        $this->address_target=$value;
    }
    public function setLogoSupplier($value) {
        $this->logoSupplier=$value;
    }

    public function setCreatedAt($value) {
        $this->createdAt = $value;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setUpdatedAt($value) {
        $this->updatedAt = $value;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function List(): array{
        $connection = $this->db->getConnection();
        if($connection){
            $query = "CALL GetListSuppliers()";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            
        }else{
            return [];
        }

    }

    public function Detail($supplierId) {
        $connection = $this->db->getConnection();
        $query = "CALL GetDetailSupplier(?)";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $supplierId, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e) {
            return false;
        }
    }

    public function ListName(): array {
        $connection = $this->db->getConnection();
        $query = "CALL GetListNameSuppliers()";
        try {
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e) {
            return [];
        }
    }
    public function Add(): bool{
        $connection = $this->db->getConnection();
            $query = "CALL AddSupplier(?,?,?,?,?)";
            $staement = $connection->prepare($query);
            $staement->bindParam(1,$this->supplierName);
            $staement->bindParam(2,$this->address_target);
            $staement->bindParam(3,$this->logoSupplier);
            $staement->bindParam(4,$this->createdAt);
            $staement->bindParam(5,$this->updatedAt);
            try {
                $staement->execute();
                return true;
            } catch (\Throwable $th) {
                return false;
            }
    }
    
    public function Edit(): bool{
        $connection = $this->db->getConnection();
            $query = "CALL UpdateSupplier(?,?,?,?,?)";
            $staement = $connection->prepare($query);
            $staement->bindParam(1,$this->supplierId);
            $staement->bindParam(2,$this->supplierName);
            $staement->bindParam(3,$this->address_target);
            $staement->bindParam(4,$this->logoSupplier);
            $staement->bindParam(5,$this->updatedAt);
            try {
                $staement->execute();
                return true;
            } catch (\Throwable $th) {
                return false; 
            }
    }
    public function Delete(): bool{
        $connection = $this->db->getConnection();
            $query = "CALL DeleteSupplier(?)";
            $staement = $connection->prepare($query);
            $staement->bindParam(1,$this->supplierId);
            try {
                $staement->execute();
                return true;
            } catch (\Throwable $th) {
                return false;
            }
    }
    public function Search(): array{
        $connection = $this->db->getConnection();
        $query = "CALL SearchSupplier(?)";
        $staement = $connection->prepare($query);
        $staement->bindParam(1,$this->supplierName);
        try {
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }

}
?>