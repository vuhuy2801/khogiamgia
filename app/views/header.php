<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$logoUrl = "https://api.vuhuy.site/uploads/LOGO_2bd919edea.png";
$homeUrl = "/trang-chu";
$maGiamGiaUrl = "#";
$theoDoiGiaSPUrl = "/theo-doi-gia";
$tinKhuyenMaiUrl = "/tin-khuyen-mai/shopee";
$huongDanUrl = "/huong-dan/shopee";
$adminUrl = "/admin/trang-chu/show";

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
                    <a class="nav-link scrollto <?php echo strpos($currentUrl, "/shopee") !== false || strpos($currentUrl, "/tiki") !== false || strpos($currentUrl, "/lazada") !== false || strpos($currentUrl, "/tiktok-shop") !== false ? 'active' : ''; ?>"
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
                    <a class="nav-link scrollto <?php echo $currentUrl === $theoDoiGiaSPUrl ? 'active' : ''; ?>"
                        href="<?php echo $theoDoiGiaSPUrl; ?>">
                        <?php echo $theoDoiGiaSpText; ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $tinKhuyenMaiUrl ? 'active' : ''; ?>"
                        href="<?php echo $tinKhuyenMaiUrl; ?>">
                        <?php echo $tinKhuyenMaiText; ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto <?php echo $currentUrl === $huongDanUrl ? 'active' : ''; ?>"
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