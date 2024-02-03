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

        $isShopeeActive = $currentURL === '/huong-dan/shopee';
        $isLazadaActive = strpos($currentURL, 'lazada') !== false;
        $isShopeeFoodActive = strpos($currentURL, 'shopee-food') !== false;
        ?>

        <div class=" d-flex justify-content-start mb-3">
            <a href="shopee" class="btn-supplier <?php echo $isShopeeActive ? 'active' : ''; ?>">
                Hướng dẫn Shopee
            </a>
            <a href="lazada" class="btn-supplier mx-3 <?php echo $isLazadaActive ? 'active' : ''; ?>">
                Hướng dẫn Lazada
            </a>
            <a href="shopee-food" class="btn-supplier <?php echo $isShopeeFoodActive ? 'active' : ''; ?>">
                Hướng dẫn Shopee Food
            </a>
        </div>

        <div class="container text-center mt-5">
            <div class="row align-items-start">
                <div class="col-3">
                    <a href=""> <img class="img_typeVoucher" src="/public/images/typeVoucher/shopee-removebg-preview.png" alt=""> </a>
                </div>
                <div class="col-3">
                    <a href=""> <img class="img_typeVoucher" src="/public/images/typeVoucher/freeship-removebg-preview.png" alt=""> </a>
                </div>
                <div class="col-3">
                    <a href=""> <img class="img_typeVoucher" src="/public/images/typeVoucher/shop-removebg-preview.png" alt=""> </a>
                </div>
                <div class="col-3">
                    <a href=""> <img class="img_typeVoucher" src="/public/images/typeVoucher/khac-removebg-preview.png" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-help-voucher">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mt-5">
                <img class="img-guidance" src="../public\images\help-voucher-2.png" alt="help-2">
            </div>
        </div>
    </div>
</section>