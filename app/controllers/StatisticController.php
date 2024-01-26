<?php
include_once 'app/models/StatisticModel.php';
class StatisticController {
    private $statisticModel;
    public function __construct() {
        $this->statisticModel = new StatisticModel();
    }
    public function logUserAccess() {
        $this->statisticModel->setUserIP($_SERVER['REMOTE_ADDR']);
        // date gmt +7
        $this->statisticModel->setVisitTime(date('Y-m-d H:i:s', time() + 7 * 3600));
        $this->statisticModel->setPageURL($_SERVER['REQUEST_URI']);
        $this->statisticModel->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $this->statisticModel->setRefererURL(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null);
        $this->statisticModel->logUserAccess();
    }
    

}

?>