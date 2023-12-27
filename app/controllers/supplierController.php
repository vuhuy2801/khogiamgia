<?php
require_once __DIR__ . '/../models/supplierModel.php';

class supplierController {
    private $supplierData;

    public function __construct() {
        $this->supplierData = new supplier(); 
    }

    public function getListOfSuppliers() {
        return $this->supplierData->List();
        
    }
}
?>