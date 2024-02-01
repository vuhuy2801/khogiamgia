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
        $totalVoucherUsed = $this->getTotalUsedVoucher();
        $totalVoucher = $this->getTotalVoucher();

        //data chart
        $chartVoucher = array(
            "labels" => ["Hết hạn", "Còn hạn"],
            "data" => [$this->getVoucherExpiredCount(), $this->getVoucherNotExpiredCount()]
        );
        $chartPost = $this->handlePostDataChart();
        $chartWebsiteAccess = array(
            "labels" => [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12",
            ],
            "data" => $this->getVisitCount12Month()
        );
        $chartVoucherCountByProvider = $this->handleVoucherProvider();
        include 'app/views/admin/statistic/statistic.php';
    }

    function handlePostDataChart()
    {
        $dataChart = $this->getPostCountByCategory();
        //Array ( [0] => Array ( [post_count] => 13 [categories_post] => 1 ) [1] => Array ( [post_count] => 2 [categories_post] => 2 ) [2] => Array ( [post_count] => 4 [categories_post] => 3 ) )
        // categories_post equal 1 set name = "Danh mục 1", 2 set name = "Danh mục 2", 3 set name = "Danh mục 3"
        //map $dataChart
        $labels = array();
        $data = array();
        foreach ($dataChart as $item) {
            array_push($labels, ($item['categories_post'] === 1) ? "Khuyến mại" : (($item['categories_post'] === 2) ? "Hướng dẫn" : "Khác"));
            array_push($data, $item['post_count']);
        }
        return array(
            "labels" => $labels,
            "data" => $data
        );
    }

    function handleVoucherProvider()
    {
        $dataChart = $this->getVoucherCountByProvider();
        $labels = array();
        $data = array();
        foreach ($dataChart as $item) {
            array_push($labels, ($item['supplierId'] === 1) ? "SHOPEE" : (($item['supplierId'] === 2) ? "TIKI" : (($item['supplierId'] === 3) ? "SHOPEEFOOD" : "LAZADA")));
            array_push($data, $item['voucher_count']);
        }
        return array(
            "labels" => $labels,
            "data" => $data
        );

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

    //getTotalUsedVoucher
    public function getTotalUsedVoucher()
    {
        return $this->statisticModel->getTotalUsedVoucher();
    }

    //getPostCountByCategory
    public function getPostCountByCategory()
    {
        return $this->statisticModel->getPostCountByCategory();
    }

    public function getVoucherExpiredCount()
    {
        return $this->statisticModel->getVoucherExpiredCount();
    }
    public function getVoucherNotExpiredCount()
    {
        return $this->statisticModel->getVoucherNotExpiredCount();
    }
    //getVisitCount12Month
    public function getVisitCount12Month()
    {
        return $this->statisticModel->getVisitCount12Month();
    }

    //getVoucherCountByProvider
    public function getVoucherCountByProvider()
    {
        return $this->statisticModel->getVoucherCountByProvider();
    }

    //getTotalVoucher
    public function getTotalVoucher()
    {
        return $this->statisticModel->getTotalVoucher();
    }


}

?>