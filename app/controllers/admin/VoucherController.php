<?php
require_once 'app/models/VoucherModel.php';
require_once 'app/models/CategoryModel.php';
require_once 'app/models/SupplierModel.php';
include_once 'app/controllers/admin/AdminController.php';


class VoucherController extends AdminController
{
    private $voucherData;
    private $categoryModel;
    private $supplierModal;


    public function __construct()
    {
        $this->voucherData = new Voucher();
        $this->categoryModel = new Category();
        $this->supplierModal = new Supplier();
    }



    public function index()
    {
        $this->checkLogin();
        $categories = $this->categoryModel->List();
        $vouchers = $this->voucherData->getListVoucherByAdmin();
        $suppliers = $this->supplierModal->List();

        require_once 'app/views/admin/vouchers/deleteModal.php';
        require_once 'lib/convertDate.php';
        require_once 'app/views/admin/vouchers/generalProcessing.php';
        include 'app/views/admin/vouchers/show.php';
    }
    public function detail()
    {
        $this->checkLogin();

        $titlePage = "Chi tiết mã giảm giá";
        $categories = $this->categoryModel->List();
        $voucherData = $this->voucherData;
        $suppliers = $this->supplierModal->List();
        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
        $voucher = $this->voucherData->getVoucherDetail($id);

        require_once 'app/views/admin/vouchers/deleteModal.php';
        require_once 'lib/convertDate.php';
        require_once 'app/views/admin/vouchers/generalProcessing.php';
        include 'app/views/admin/vouchers/detail.php';
    }

    public function create()
    {
        $this->checkLogin();

        $categories = $this->categoryModel->List();

        $titlePage = "Thêm mã giảm giá";

        $suppliers = $this->supplierModal->ListName();
        require_once 'app/views/admin/vouchers/generalProcessing.php';

        include_once 'app/views/admin/vouchers/create.php';
    }

    public function edit()
    {
        $this->checkLogin();

        $titlePage = "Sửa mã giảm giá";
        $categories = $this->categoryModel->List();
        $voucherData = $this->voucherData;

        $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
        $voucher = $this->voucherData->getVoucherDetail($id);

        $suppliers = $this->supplierModal->List();
        require_once 'lib/convertDate.php';
        require_once 'app/views/admin/vouchers/generalProcessing.php';
        include 'app/views/admin/vouchers/edit.php';
    }



    // function format date year/month/day

    public function add()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expressAt = date('Y-m-d', strtotime($_POST['expressAt']));
        $expiresAt = date('Y-m-d', strtotime($_POST['expiresAt']));

        // Tạo đối tượng Voucher và đặt các giá trị từ dữ liệu POST
        $voucher = new Voucher();
        $voucher->setVoucherId($_POST['voucherId']);
        $voucher->setVoucherName($_POST['voucherName']);
        $voucher->setQuantity($_POST['quantity']);
        $voucher->setExpressAt($expressAt);
        $voucher->setExpiresAt($expiresAt);
        $voucher->setMinimumDiscount($_POST['minimumDiscount']);
        $voucher->setConditionsOfUse($_POST['conditionsOfUse']);
        $voucher->setCategoryId($_POST['categoryId']);
        $voucher->setCreatedAt(date('Y-m-d H:i:s'));
        $voucher->setUpdatedAt(date('Y-m-d H:i:s'));
        $voucher->setIsTrend($_POST['is_trend']);
        $voucher->setSupplierId($_POST['supplierId']);
        $voucher->setStatus(1);
        $voucher->setAddress_target($_POST['address_target']);
        $voucher->setDiscountType($_POST['discountType']);
        $voucher->setMaximunDiscount($_POST['maximumDiscount']);
        $voucher->setIs_inWallet($_POST['is_inWallet']);

        // Gọi hàm addVoucher() trong model
        if ($this->voucherData->addVoucher($voucher)) {
            header('Location: ../ma-giam-gia/danh-sach');
            exit(); // Đảm bảo chương trình kết thúc sau khi chuyển hướng
        } else {
            echo "Thêm mã giảm giá thất bại";
        }
    }


    public function update()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expressAt = date('Y-m-d', strtotime($_POST['expressAt']));
        $expiresAt = date('Y-m-d', strtotime($_POST['expiresAt']));

        // Tạo đối tượng Voucher và đặt các giá trị từ dữ liệu POST
        $voucher = new Voucher();
        $voucher->setVoucherId($_POST['voucherId']);
        $voucher->setVoucherName($_POST['voucherName']);
        $voucher->setQuantity($_POST['quantity']);
        $voucher->setExpressAt($expressAt);
        $voucher->setExpiresAt($expiresAt);
        $voucher->setMinimumDiscount($_POST['minimumDiscount']); // Lưu ý sửa chính tả
        $voucher->setConditionsOfUse($_POST['conditionsOfUse']);
        $voucher->setCategoryId($_POST['categoryId']);
        $voucher->setUpdatedAt(date('Y-m-d H:i:s'));
        $voucher->setIsTrend($_POST['is_trend']);
        $voucher->setSupplierId($_POST['supplierId']);
        $voucher->setStatus(1);
        $voucher->setAddress_target($_POST['address_target']);
        $voucher->setDiscountType($_POST['discountType']);
        $voucher->setMaximunDiscount($_POST['maximumDiscount']); // Lưu ý sửa chính tả
        $voucher->setIs_inWallet($_POST['is_inWallet']);

        // Gọi hàm updateVoucher() từ model và truyền đối tượng Voucher vào
        if ($this->voucherData->updateVoucher($voucher)) {
            header('Location: ../ma-giam-gia/danh-sach');
            exit(); // Đảm bảo chương trình kết thúc sau khi chuyển hướng
        } else {
            echo "Sửa mã giảm giá thất bại";
        }
    }


    public function delete($voucherId)
    {
        if ($this->voucherData->deleteVoucher($voucherId)) {
            // Đặt thông báo vào session
            $_SESSION['success_message'] = "Mã giảm giá đã được xóa thành công.";

            header('Location: ../danh-sach');
            exit(); // Đảm bảo chương trình kết thúc sau khi chuyển hướng
        } else {
            echo "Xóa mã giảm giá thất bại";
        }
    }
}
