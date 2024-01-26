<?php
include_once 'app/models/VoucherModel.php';

class VoucherController
{
    private $voucherModel;

    public function __construct()
    {
        $this->voucherModel = new Voucher();
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

}


?>