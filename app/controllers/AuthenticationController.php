<?php
include_once 'app/models/UserModel.php';
class AuthenticationController
{
    public function loginView()
    {
        include_once 'app/views/login/login.php';
    }

    public function handleLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userModel = new User();
        $user = $userModel->getUserByUsername($username);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            print_r($_SESSION['user']);
            header('Location: /admin/trang-chu/show');
        } else {
            $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
            header('Location: /login');
        }
    }
    // check is login
    public function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: login.php"); // redirect to login page if user is not logged in
            exit();
        }

    }
    public function logout()
    {
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Đăng xuất thành công';
        header('Location: /login');
    }
}



?>