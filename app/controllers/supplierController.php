<?php
require_once __DIR__ . '/../models/SupplierModel.php';

class supplierController {
    private $supplierData;

    public function __construct() {
        $this->supplierData = new Supplier(); 
    }

    public function getListOfSuppliers() {
        return $this->supplierData->List();
        
    }
}
?>