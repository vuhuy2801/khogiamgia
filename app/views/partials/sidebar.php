<?php
$logoUrl = "https://api.vuhuy.site/uploads/LOGO_2bd919edea.png";
$homeUrl = "/trang-chu";
$maGiamGiaUrl = "#";
$theoDoiGiaSPUrl = "#";
$noiDungUrl = "#";
$nhaCungCapUrl = "#";
$thongKeUrl = "#";
$dangXuatUrl = "#";

//text variables
$trangChuText = "Trang chủ";
$maGiamGiaText = "Quản lý mã giảm giá";
$theoDoiGiaSpText = "Theo dõi giá sản phẩm";
$noiDungText = "Quản lý nội dung";
$nhaCungCapText = "Quản lý nhà cung cấp";
$thongKeText = "Thống kê";
$dangXuat = "Đăng xuất"
 ?>
<!-- sidebar -->
<div class="col-auto col-md-3 col-xl-2 px-0 bg-white wrap-sidebar ">
    <div class=" d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
        <nav id="sidebar" class="sidebar">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                <div class="wrap-logo mb-2 justify-content-center d-flex mt-5">
                    <a href="#" class="text-dark text-decoration-none">
                        <img src="<?php echo $logoUrl; ?>" alt="logo" class="logo" />
                    </a>
                </div>

                <li class="wrap-item py-2 nav-item mt-5">
                    <a href="#" class="nav-link align-middle px-0 text-dark">
                        <span class="ms-1 d-none d-sm-inline"><?= $trangChuText ?></span>
                    </a>
                </li>

                <li class="wrap-item py-2 nav-item">
                    <a href="#" class="nav-link px-0 align-middle text-dark">
                        <span class="ms-1 d-none d-sm-inline"><?= $maGiamGiaText ?></span></a>
                </li>
                <li class="wrap-item py-2 nav-item">
                    <a href="#" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $theoDoiGiaSpText ?></span></a>
                </li>
                <li class="wrap-item py-2 nav-item active">
                    <a href="#" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $noiDungText ?></span></a>
                </li>
                <li class="wrap-item py-2 nav-item">
                    <a href="#" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $nhaCungCapText ?></span></a>
                </li>
                <li class="wrap-item py-2 nav-item">
                    <a href="#" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $thongKeText ?></span></a>
                </li>
                <li class="wrap-item py-2 nav-item">
                    <a href="#" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $dangXuat ?></span></a>
                </li>

            </ul>
        </nav>

    </div>
</div>