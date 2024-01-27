<?php
include_once 'app/controllers/admin/AdminController.php';
include_once 'app/models/StatisticModel.php';
class HomeAdminController extends AdminController
{
    private $statisticModel;
    public function __construct()
    {
        $this->statisticModel = new StatisticModel();
    }
    public function index()
    {
        $this->checkLogin();
        $RealtimeUserCount = $this->getRealtimeUserCount();
        $TotalVisitCountToday = $this->getTotalVisitCountToday();
        $TotalVisitCount = $this->getTotalVisitCount();
        $VisitCount24h = $this->getVisitCount24h();
        $TotalUsedVoucherCount = $this->getTodayUsedVoucher();
        include 'app/views/admin/home/index.php';
    }
    public function getRealtimeUserCount()
    {
        return $this->statisticModel->getRealtimeUserCount();
    }
    // total visit count today
    public function getTotalVisitCountToday()
    {
        return $this->statisticModel->getTotalVisitCountToday();
    }
    // total visit count
    public function getTotalVisitCount()
    {
        return $this->statisticModel->getTotalVisitCount();
    }
    // get getVisitCount24h
    public function getVisitCount24h()
    {
        return $this->statisticModel->getVisitCount24h();
    }
    //getTodayUsedVoucher
    public function getTodayUsedVoucher()
    {
        return $this->statisticModel->getTodayUsedVoucher();
    }
}

?>