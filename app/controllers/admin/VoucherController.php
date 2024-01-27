<?php
require_once 'app/models/VoucherModel.php';
require_once 'app/models/CategoryModel.php';
require_once 'app/models/SupplierModel.php';
include_once 'app/controllers/admin/AdminController.php';


class VoucherController extends AdminController{
    private $voucherData;
    private $categoryModel;
    private $supplierModal;


    public function __construct() {
        $this->voucherData = new Voucher(); 
        $this->categoryModel = new Category();
        $this->supplierModal = new Supplier();

    }

    public function getListOfVoucher() {
        return $this->voucherData->List();
    }

    public function getDetail($id) {
        return $this->voucherData->Detail($id);
    }

    // public function getPrices($id) {
    //     return $this->voucherData->GetProductWithPriceById($id);
    // }
   
    public function index()
    {
        $this->checkLogin();
        $categories = $this->categoryModel->List();
        $vouchers = $this->voucherData->List();
        $suppliers = $this->supplierModal->List();
      include 'app/views/admin/vouchers/show.php';
      
    }
    public function detail()
    {
        $this->checkLogin();

        $titlePage = "Chi tiết mã giảm giá";
        $categories = $this->categoryModel->List();
        $voucherData = $this->voucherData;
        $suppliers = $this->supplierModal->List();

      include 'app/views/admin/vouchers/detail.php';
      
    }

    public function create()
    {
        $this->checkLogin();

        $categories = $this->categoryModel->List();
       
        $titlePage = "Thêm mã giảm giá";
   
        $suppliers = $this->supplierModal->ListName();
        
        include_once 'app/views/admin/vouchers/create.php';
    }

    public function edit()
    {
        $this->checkLogin();

        $titlePage = "Sửa mã giảm giá";
        $categories = $this->categoryModel->List();
        $voucherData = $this->voucherData;

        $suppliers = $this->supplierModal->List();

        include 'app/views/admin/vouchers/edit.php';
    }
  
  

    // function format date year/month/day
 
    public function add() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expressAt = date('Y-m-d', strtotime($_POST['expressAt']));
        $expiresAt = date('Y-m-d', strtotime($_POST['expiresAt']));
        $this->voucherData->setVoucherId($_POST['voucherId']);
        $this->voucherData->setVoucherName($_POST['voucherName']);
        $this->voucherData->setQuantity($_POST['quantity']);
        $this->voucherData->setExpressAt($expressAt);
        $this->voucherData->setExpiresAt($expiresAt);
        $this->voucherData->setMinimumDiscount(($_POST['minimunDiscount']));
        $this->voucherData->setConditionsOfUse(($_POST['conditionsOfUse']));
        $this->voucherData->setCategoryId(($_POST['categoryId']));
        $this->voucherData->setCreatedAt(date('Y-m-d H:i:s'));
        $this->voucherData->setUpdatedAt(date('Y-m-d H:i:s'));
        $this->voucherData->setIsTrend($_POST['is_trend']);
        $this->voucherData->setSupplierId($_POST['supplierId']);
        $this->voucherData->setStatus(1);
        $this->voucherData->setAddress_target($_POST['address_target']);
        $this->voucherData->setDiscountType($_POST['discountType']);
        $this->voucherData->setMaximunDiscount($_POST['maximumDiscount']);
        $this->voucherData->setIs_inWallet($_POST['is_inWallet']);
        
        if ($this->voucherData->Add()){
            header('Location: ../ma-giam-gia/danh-sach');
        }else{
            echo "Thêm mã giảm giá thất bại";
        }
        
    }

    public function update() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expressAt = date('Y-m-d', strtotime($_POST['expressAt']));
        $expiresAt = date('Y-m-d', strtotime($_POST['expiresAt']));
        $this->voucherData->setVoucherId($_POST['voucherId']);
        $this->voucherData->setVoucherName($_POST['voucherName']);
        $this->voucherData->setQuantity($_POST['quantity']);
        $this->voucherData->setExpressAt($expressAt);
        $this->voucherData->setExpiresAt($expiresAt);
        $this->voucherData->setMinimumDiscount(($_POST['minimunDiscount']));
        $this->voucherData->setConditionsOfUse(($_POST['conditionsOfUse']));
        $this->voucherData->setCategoryId(($_POST['categoryId']));
        $this->voucherData->setUpdatedAt(date('Y-m-d H:i:s'));
        $this->voucherData->setIsTrend($_POST['is_trend']);
        $this->voucherData->setSupplierId($_POST['supplierId']);
        $this->voucherData->setStatus(1);
        $this->voucherData->setAddress_target($_POST['address_target']);
        $this->voucherData->setDiscountType($_POST['discountType']);
        $this->voucherData->setMaximunDiscount($_POST['maximumDiscount']);
        $this->voucherData->setIs_inWallet($_POST['is_inWallet']);
        if ($this->voucherData->Edit()){
            header('Location: ../ma-giam-gia/danh-sach');
        }else{
            echo "Sửa mã giảm giá thất bại";
        }
        
    }

    public function delete($voucherId) {
        $this->voucherData->setVoucherId($voucherId);
        if ($this->voucherData->Delete()){
            header('Location: ../danh-sach');
        }else{
            echo "Xóa mã giảm giá thất bại";
        }
        
    }

    
   
 
}