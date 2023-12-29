<?php
$currentUrl = $_SERVER['REQUEST_URI'];

$logoUrl = "https://api.vuhuy.site/uploads/LOGO_2bd919edea.png";
$homeUrl = "/trang-chu";
$maGiamGiaUrl = "#";
$theoDoiGiaSPUrl = "#";
$tinKhuyenMaiUrl = "#";
$huongDanUrl = "#";

// Text variables
$trangChuText = "Trang chủ";
$maGiamGiaText = "Mã giảm giá";
$theoDoiGiaSpText = "Theo dõi giá sản phẩm";
$tinKhuyenMaiText = "Tin khuyến mại";
$huongDanText = "Hướng dẫn";

?>

<!-- Nav -->
<header id="header" class="d-flex align-items-center header-scroll">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="<?php echo $homeUrl; ?>" class="logo"><img src="<?php echo $logoUrl; ?>" alt="logo" /></a>
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $homeUrl ? 'active' : '' ?>"
                        href="<?php echo $homeUrl; ?>">
                        <?php echo $trangChuText; ?>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="nav-link scrollto <?php echo $currentUrl === "/shopee" || $currentUrl === "/tiki" || $currentUrl === "/lazada" || $currentUrl === "/tiktok-shop" ? 'active' : '' ?>"
                        href="<?php echo $maGiamGiaUrl; ?>">
                        <?php echo $maGiamGiaText; ?>
                    </a>
                    <ul>
                        <li><a href="/shopee">shopee</a></li>
                        <li><a href="/tiki">tiki</a></li>
                        <li><a href="/lazada">lazada</a></li>
                        <li><a href="/tiktok-shop">tiktok shop</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link scrollto" href="<?php echo $theoDoiGiaSPUrl; ?>">
                        <?php echo $theoDoiGiaSpText; ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="<?php echo $tinKhuyenMaiUrl; ?>">
                        <?php echo $tinKhuyenMaiText; ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="<?php echo $huongDanUrl; ?>">
                        <?php echo $huongDanText; ?>
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End NAV -->