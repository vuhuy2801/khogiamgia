<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
    <title>Đăng nhập</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/public/css/general.css" />
    <link rel="stylesheet" href="/public/css/login.css" />
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="text-center logo">
                    <img src="/public/images/LOGO.png" alt="" />
                    <p class="mt-3">Hệ thống quản trị - khogiamgia.xyz</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form class="form-login" method="post">
                    <!-- dynamic arlet -->
                    <div class="alert <?php echo isset($_SESSION['error']) ? "alert-danger" : (isset($_SESSION['success']) ? "alert-success" : "alert-danger d-none") ?>"
                        role="alert">
                        <?php echo isset($_SESSION['error']) ? $_SESSION['error'] : (isset($_SESSION['success']) ? $_SESSION['success'] : "") ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                    <?php unset($_SESSION['success']); ?>
                    <!-- end dynamic arlet -->



                    <div class="form-group mt-4">
                        <label for="username">Tài khoản</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username"
                            name="username" />
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password"
                            name="password" />
                    </div>
                    <div class="form-group mt-2 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" />
                        <label class="form-check-label" for="remember">Ghi nhớ</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">
                        Đăng nhập
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- BEGIN: COPYRIGHT -->
    <footer class="footer">
        <div class="container">
            <p class="text-center">
                NHÓM 1 - VŨ QUANG HUY, LÒ TIẾN ANH - EAUT &copy; 2024
                khogiamgia.xyz. All rights reserved.
            </p>
        </div>
    </footer>
    <!-- END: COPYRIGHT -->
    <script src="/public/js/login.js"></script>
</body>

</html>