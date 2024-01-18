<section>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="titlePost">
                    <h2>HƯỚNG DẪN SỬ DỤNG MÃ GIẢM GIÁ</h2>
                </div>
            </div>
        </div>
        <?php
            $currentURL = $_SERVER['REQUEST_URI'];

            $isShopeeActive = strpos($currentURL, 'shopee') !== false;
            $isLazadaActive = strpos($currentURL, 'lazada') !== false;
            $isTiktokActive = strpos($currentURL, 'tiktok') !== false;
            ?>

        <div class=" d-flex justify-content-start mb-3">
            <a href="shopee" class="btn-supplier <?php echo $isShopeeActive ? 'active' : ''; ?>">
                Hướng dẫn Shopee
            </a>
            <a href="lazada" class="btn-supplier mx-3 <?php echo $isLazadaActive ? 'active' : ''; ?>">
                Hướng dẫn Lazada
            </a>
            <a href="tiktokshop" class="btn-supplier <?php echo $isTiktokActive ? 'active' : ''; ?>">
                Hướng dẫn Tiktok Shop
            </a>
        </div>

        <div class="container text-center mt-5">
            <div class="row align-items-start">
                <div class="col-3">
                    <a href=""> <img src="/public/images/typeVoucher/shopee-removebg-preview.png" alt=""> </a>
                </div>
                <div class="col-3">
                    <a href=""> <img src="/public/images/typeVoucher/freeship-removebg-preview.png" alt=""> </a>
                </div>
                <div class="col-3">
                    <a href=""> <img src="/public/images/typeVoucher/shop-removebg-preview.png" alt=""> </a>
                </div>
                <div class="col-3">
                    <a href=""> <img src="/public/images/typeVoucher/khac-removebg-preview.png" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-help-voucher" style=" padding: 35px 0px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mt-5">
                <img class="img-guidance" src="../public\images\help-voucher-2.png" alt="help-2">
            </div>
        </div>
    </div>
</section>