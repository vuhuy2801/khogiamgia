<?php
class AdminController
{

    public function __construct()
    {
        // Thực hiện các công việc khởi tạo cho controllers admin
    }

    public function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login"); // redirect to login page if user is not logged in
            exit();
        }
    }

    // Các phương thức khác mà các controllers admin có thể chia sẻ
}


?>