<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$logoUrl = "https://api.vuhuy.site/uploads/LOGO_2bd919edea.png";
$homeUrl = "/trang-chu";
$maGiamGiaUrl = "#";
$theoDoiGiaSPUrl = "/theo-doi-gia";
$tinKhuyenMaiUrl = "/tin-khuyen-mai/shopee";
$huongDanUrl = "/huong-dan/shopee";
$adminUrl = "/admin/trang-chu/kho-giam-gia";


// Text variables
$trangChuText = "Trang chủ";
$maGiamGiaText = "Mã giảm giá";
$theoDoiGiaSpText = "Theo dõi giá sản phẩm";
$tinKhuyenMaiText = "Tin khuyến mại";
$huongDanText = "Hướng dẫn";
$adminText = "Admin";
?>

<!-- Nav -->
<header id="header" class="d-flex align-items-center header-scroll">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="<?php echo $homeUrl; ?>" class="logo"><img src="<?php echo $logoUrl; ?>" alt="logo" /></a>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $homeUrl || $currentUrl === "/" ? 'active' : ''; ?>"
                        href="<?php echo $homeUrl; ?>">
                        <?php echo $trangChuText; ?>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="nav-link scrollto <?php echo 
                    $currentUrl === "/shopee" || $currentUrl === "/shopee/toan-san" 
                    || $currentUrl === "/shopee/shopee-mail" || $currentUrl === "/shopee/extra"
                    || $currentUrl === "/shopee/thoi-trang" || $currentUrl === "/shopee/tieu-dung"
                    || $currentUrl === "/shopee/doi-song" || $currentUrl === "/shopee/dien-tu"
                    || $currentUrl === "/tiki" || $currentUrl === "/lazada" || $currentUrl === "/shopee-food" ? 'active' : ''; ?>"
                        href="<?php echo $maGiamGiaUrl; ?>">
                        <?php echo $maGiamGiaText; ?>
                    </a>
                    <ul>
                        <li><a href="/shopee">shopee</a></li>
                        <li><a href="/tiki">tiki</a></li>
                        <li><a href="/lazada">lazada</a></li>
                        <li><a href="/shopee-food">shopee food</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $theoDoiGiaSPUrl ? 'active' : ''; ?>"
                        href="<?php echo $theoDoiGiaSPUrl; ?>">
                        <?php echo $theoDoiGiaSpText; ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $tinKhuyenMaiUrl || $currentUrl === '/tin-khuyen-mai/shopee' || $currentUrl === '/tin-khuyen-mai/lazada' || $currentUrl === '/tin-khuyen-mai/shopeeFood' ? 'active' : ''; ?>"
                        href="<?php echo $tinKhuyenMaiUrl; ?>">
                        <?php echo $tinKhuyenMaiText; ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $huongDanUrl || $currentUrl === '/huong-dan/shopee' || $currentUrl === '/huong-dan/lazada' || $currentUrl === '/huong-dan/shopee-food' ? 'active' : ''; ?>"
                        href="<?php echo $huongDanUrl; ?>">
                        <?php echo $huongDanText; ?>
                    </a>
                </li>

                <?php
                // if login
                if (isset($_SESSION['user'])) {
                    echo ' <li><a class="nav-link scrollto" href="' . $adminUrl . '">' . $adminText . '</a> </li>';
                }
                ?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End NAV -->