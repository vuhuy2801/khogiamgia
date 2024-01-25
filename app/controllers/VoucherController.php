<?php


class VoucherController
{
    public function index()
    {
        $this->showShoppee();
    }

    public function showShoppee()
    {
        include 'app/views/voucher/shopee.php';
    }
    public function showTiki()
    {
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