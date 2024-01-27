<?php
include_once 'app/models/VoucherModel.php';
include_once 'app/models/UsedModel.php';
require_once 'app/models/CategoryModel.php';

class VoucherController
{
    private $voucherModel;
    private $categoryModel;

    private $usedModel;

    public function __construct()
    {
        $this->voucherModel = new Voucher();
        $this->usedModel = new Used();
        $this->categoryModel = new Category();

    }
    public function index()
    {
        $this->showShoppee();
    }

    public function showShoppee()
    {
        $vouchersShopee = $this->voucherModel->ListVoucherBySupplier(1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/shopee.php';
    }

    public function showShopeeFashion()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(4,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeFashion.php';
    }

    public function showShopeeAll()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(1,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeAll.php';
    }


    public function showShopeeMail()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(2,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeMail.php';
    }

    public function showShopeeExtra()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(3,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeExtra.php';
    }

    public function showShopeeConsum()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(5,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeConsumption.php';
    }

    public function showShopeeLife()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(6,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeLife.php';
    }

    public function showShopeeElectronic()
    {
        $vouchersShopee = $this->voucherModel->GetVouchersByCategoryId(7,1);
        $categories = $this->voucherModel->List();
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/categoriesShopee/shopeeElectronic.php';
    }

    public function showTiki()
    {
        $titleVoucher = "MÃ GIẢM GIÁ TIKI";
        $vouchers = $this->voucherModel->ListVoucherBySupplier(2);
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/tiki.php';
    }
    public function showLazada()
    {
        $titleVoucher = "MÃ GIẢM GIÁ LAZADA";
        $vouchers = $this->voucherModel->ListVoucherBySupplier(4);
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/lazada.php';
    }
    public function shopeeFood()
    {
        $titleVoucher = "MÃ GIẢM GIÁ SHOPEE FOOD";
        $vouchers = $this->voucherModel->ListVoucherBySupplier(3);
        $manually = array(
            0 => "Mã nhập tay",
            1 => "Có sẵn trong ví"
        );
        include 'app/views/voucher/shopeeFood.php';
    }

    // update used count
    public function updateUsedCount()
    {
        $_POST = json_decode(file_get_contents("php://input"), true);
        header('Content-Type: application/json');

        $voucherId = isset($_POST['voucherId']) ? $_POST['voucherId'] : null;
        if ($voucherId === null) {
            http_response_code(400);
            echo json_encode(
                array(
                    'status' => false,
                    'message' => 'Voucher không tồn tại'
                )
            );
            return;
        }
        $isVoucherExist = $this->usedModel->isExistUsed($voucherId);
        if ($isVoucherExist === false) {
            // add new used
            $this->usedModel->addUsed($voucherId, 1);

        } else {
            $usedVoucher = $this->usedModel->getUsedByVoucherId($voucherId);
            $usedCount = $usedVoucher[0]['usedCount'];
            $usedCount++;
            $this->usedModel->updateUsed($voucherId, $usedCount);
        }
        echo json_encode(
            array(
                'status' => true,
                'message' => 'Cập nhật thành công'
            )
        );



    }

}


?>