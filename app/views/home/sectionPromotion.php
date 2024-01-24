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
            require_once 'app/views/component/itemPromotion.php';
           
            ?>
        </div>


        <div class="d-flex justify-content-center mt-5">
            <button type="button" class="btn btn-xem-them">Xem thêm</button>
        </div>
    </div>
</section>
<!-- End Section promotion -->