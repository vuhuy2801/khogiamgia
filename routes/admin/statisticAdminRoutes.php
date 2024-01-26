<?php
// Router admin statistic
$router->get('/admin/thong-ke/show', function () {
    require 'app/controllers/admin/StatisticController.php';
    $StatisticControllerAdmin = new StatisticControllerAdmin();
    $StatisticControllerAdmin->index();
});


?>