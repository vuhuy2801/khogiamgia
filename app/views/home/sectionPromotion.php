<!-- Section promotion -->
<section class="section-promotion" style="background-color: #f3f3f3; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>
                        <?php echo $titleVoucher ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row list-promotion justify-content-center gap-2">
            <?php
            require_once 'app\views\component\itemPromotion.php';
            echo itemPromotion('Free Ship', '2023-12-22', '10%', '100,000vnđ', '20,000vnđ', 'Mã nhập tay', 99, 'Thời trang', 'Mã giảm giá sử dụng 1 lần');
            echo itemPromotion('Free Ship', '2023-12-23', '15%', '120,000vnđ', '25,000vnđ', 'Có sẵn trong ví', 80, 'Điện tử', 'Khuyến mãi đặc biệt');
            echo itemPromotion('Voucher extra', '2023-12-24', '20%', '150,000vnđ', '30,000vnđ', 'Mã nhập tay', 75, 'Đồ gia dụng', 'Giảm giá cuối năm');
            echo itemPromotion('Voucher extra', '2023-12-25', '25%', '200,000vnđ', '40,000vnđ', 'Mã nhập tay', 60, 'Thực phẩm', 'Khuyến mãi Noel');
            echo itemPromotion('shopee live', '2023-12-26', '30%', '250,000vnđ', '50,000vnđ', 'Có sẵn trong ví', 50, 'Điện lạnh', 'Bán hết cuối năm');
            echo itemPromotion('shopee live', '2023-12-27', '12%', '180,000vnđ', '35,000vnđ', 'Có Sẵn trong ví', 90, 'Thời trang', 'Mùa đông ấm áp');


            ?>
        </div>


        <div class="d-flex justify-content-center mt-5">
            <button type="button" class="btn btn-xem-them">Xem thêm</button>
        </div>
    </div>
</section>
<!-- End Section promotion -->