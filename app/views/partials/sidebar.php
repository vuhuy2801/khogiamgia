<?php
$logoUrl = "https://api.vuhuy.site/uploads/LOGO_2bd919edea.png";
$homeUrl = "../trang-chu/show";
$maGiamGiaUrl = "../ma-giam-gia/show";
$theoDoiGiaSPUrl = "../theo-doi-gia-san-pham/show";
$noiDungUrl = "../bai-viet/show";
$bannerUrl = "../banner/show";
$nhaCungCapUrl = "../nha-cung-cap/show";
$thongKeUrl = "../thong-ke/show";
$dangXuatUrl = "#";

//text variables
$trangChuText = "Trang chủ";
$maGiamGiaText = "Quản lý mã giảm giá";
$theoDoiGiaSpText = "Theo dõi giá sản phẩm";
$noiDungText = "Quản lý nội dung";
$bannerText = "Quản lý banner";
$nhaCungCapText = "Quản lý nhà cung cấp";
$thongKeText = "Thống kê";
$dangXuat = "Đăng xuất";

$currentPage = $_SERVER['REQUEST_URI'];
?>
<!-- sidebar -->
<div class="col-auto col-md-3 col-xl-2 px-0 bg-white wrap-sidebar ">
    <div class=" d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
        <nav id="sidebar" class="sidebar">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                <div class="wrap-logo mb-2 justify-content-center d-flex mt-5">
                    <a href="<?php echo $homeUrl ?>" class="text-dark text-decoration-none">
                        <img src="<?php echo $logoUrl; ?>" alt="logo" class="logo" />
                    </a>
                </div>

                <li
                    class="wrap-item py-2 nav-item mt-5 <?php echo strpos($currentPage, 'trang-chu') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $homeUrl ?>" class="nav-link align-middle px-0 text-dark">
                        <span class="ms-1 d-none d-sm-inline"><?= $trangChuText ?></span>
                    </a>
                </li>

                <li
                    class="wrap-item py-2 nav-item <?php echo strpos($currentPage, 'ma-giam-gia') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $maGiamGiaUrl ?>" class="nav-link px-0 align-middle text-dark">
                        <span class="ms-1 d-none d-sm-inline"><?= $maGiamGiaText ?></span></a>
                </li>
                <li
                    class="wrap-item py-2 nav-item <?php echo strpos($currentPage, 'theo-doi-san-pham') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $theoDoiGiaSPUrl ?>" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $theoDoiGiaSpText ?></span></a>
                </li>
                <li
                    class="wrap-item py-2 nav-item <?php echo strpos($currentPage, 'bai-viet') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $noiDungUrl ?>" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $noiDungText ?></span></a>
                </li>
                <li
                    class="wrap-item py-2 nav-item <?php echo strpos($currentPage, 'nha-cung-cap') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $nhaCungCapUrl ?>" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $nhaCungCapText ?></span></a>
                </li>
                <li
                    class="wrap-item py-2 nav-item <?php echo strpos($currentPage, 'banner') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $bannerUrl ?>" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $bannerText ?></span></a>
                </li>
                <li
                    class="wrap-item py-2 nav-item <?php echo strpos($currentPage, 'thong-ke') !== false ? 'active' : ''; ?>">
                    <a href="<?php echo $thongKeUrl ?>" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $thongKeText ?></span></a>
                </li>
                <li class="wrap-item py-2 nav-item">
                    <a href="<?php  ?>" class="nav-link px-0 align-middle text-dark">
                        </i> <span class="ms-1 d-none d-sm-inline"><?= $dangXuat ?></span></a>
                </li>

            </ul>
        </nav>

    </div>
</div>