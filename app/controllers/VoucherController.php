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
        $vouchersTiki = $this->voucherModel->ListVoucherBySupplier(2);
        $manually = array(
            0 => "Mã có sẵn",
            1 => "Mã nhập tay"
        );
        include 'app/views/voucher/tiki.php';
    }
    public function showLazada()
    {
        include 'app/views/voucher/lazada.php';
    }
    public function tiktokShop()
    {
        include 'app/views/voucher/tiktok.php';
    }

    // update used count
    public function updateUsedCount()
    {
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
            $usedCount = $usedVoucher['usedCount'];
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