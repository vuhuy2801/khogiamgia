<?php
require_once 'dbConnection.php';
require_once __DIR__ . '/interface/supplierService.php';

class supplier implements SupplierService {
    private $supplierId;
    private $supplierName;
    private $address;
    private $logoSupplier; 
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
    public function getAddress() {
        return $this->address;
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
    public function setAddress($value) {
        $this->address=$value;
    }
    public function setLogoSupplier($value) {
        $this->logoSupplier=$value;
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
}
?>