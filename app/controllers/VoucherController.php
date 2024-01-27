<?php
include_once 'app/models/VoucherModel.php';
include_once 'app/models/UsedModel.php';

class VoucherController
{
    private $voucherModel;

    private $usedModel;

    public function __construct()
    {
        $this->voucherModel = new Voucher();
        $this->usedModel = new Used();
    }
    public function index()
    {
        $this->showShoppee();
    }

    public function showShoppee()
    {
        $vouchersShopee = $this->voucherModel->ListVoucherBySupplier(1);
        $manually = array(
            0 => "Mã có sẵn",
            1 => "Mã nhập tay"
        );

       
        include 'app/views/voucher/shopee.php';
    }
    public function showTiki()
    {
        $titleVoucher = "MÃ GIẢM GIÁ TIKI";
        $vouchers = $this->voucherModel->ListVoucherBySupplier(2);
        $manually = array(
            0 => "Mã có sẵn",
            1 => "Mã nhập tay"
        );
        include 'app/views/voucher/tiki.php';
    }
    public function showLazada()
    {
        $titleVoucher = "MÃ GIẢM GIÁ LAZADA";
        $vouchers = $this->voucherModel->ListVoucherBySupplier(2);
        $manually = array(
            0 => "Mã có sẵn",
            1 => "Mã nhập tay"
        );
        include 'app/views/voucher/lazada.php';
    }
    public function shopeeFood()
    {
        $titleVoucher = "MÃ GIẢM GIÁ SHOPEE FOOD";
        $vouchers = $this->voucherModel->ListVoucherBySupplier(2);
        $manually = array(
            0 => "Mã có sẵn",
            1 => "Mã nhập tay"
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