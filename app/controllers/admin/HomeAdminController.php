<?php
include_once 'app/controllers/admin/AdminController.php';
class HomeAdminController extends AdminController
{
    public function index()
    {
        $this->checkLogin();
        include 'app/views/admin/home/index.php';
    }
}

?>