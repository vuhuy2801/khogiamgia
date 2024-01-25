<?php
include_once 'app/controllers/admin/AdminController.php';
include_once 'app/models/StatisticModel.php';
class StatisticControllerAdmin extends AdminController
{
    private $statisticModel;
    public function __construct()
    {
        $this->statisticModel = new StatisticModel();
    }
    public function index()
    {
        $this->checkLogin();
        $totalVoucherExpired = $this->getTotalVoucherExpired();
        $totalProduct = $this->getTotalProduct();
        $totalPost = $this->getTotalPost();
        $totalVisitCount = $this->getTotalVisitCount();
        include 'app/views/admin/statistic/statistic.php';
    }

    // getTotalVoucherExpired
    public function getTotalVoucherExpired()
    {
        return $this->statisticModel->getTotalVoucherExpired();
    }
    // getTotalProduct
    public function getTotalProduct()
    {
        return $this->statisticModel->getTotalProduct();
    }
    // getTotalPost
    public function getTotalPost()
    {
        return $this->statisticModel->getTotalPost();
    }

    //getTotalVisitCount
    public function getTotalVisitCount()
    {
        return $this->statisticModel->getTotalVisitCount();
    }


}

?>