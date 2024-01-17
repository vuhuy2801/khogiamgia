<?php
require_once __DIR__ . '/../../models/SupplierModel.php';

class SupplierController {
    private $supplierData;

    public function __construct() {
        $this->supplierData = new Supplier(); 
    }

    public function getListOfSuppliers() {
        return $this->supplierData->List();
        
    }

    public function getListNameSuppliers() {
        return $this->supplierData->ListName();
        
    }

    public function index() {
        include 'app/views/admin/suppliers/show.php';
    }
}
?>