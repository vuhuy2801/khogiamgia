<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/general.css">
    <link rel="stylesheet" href="/public/css/admin/statistic.css">
</head>

<body>
    <div class="container-fluid">
        <!-- end -->
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';

            ?>

            <!-- end sidebar -->
            <div class="col px-3 py-3 wrap_dasboard">
                <div class="row justify-content-center statistics-container">
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-calendar-minus"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Số lượng mã giảm giá hết hạn</span>
                                    <b>
                                        <?php echo $totalVoucherExpired ?>
                                    </b>
                                    <a class="text-end" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-speedometer2"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Tổng sản phẩm đang theo dõi</span>
                                    <b>
                                        <?php echo $totalProduct ?>
                                    </b>
                                    <a class="text-end" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-newspaper"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Tổng số bài viết trên trang</span>
                                    <b>
                                        <?php echo $totalPost ?>
                                    </b>
                                    <a class="text-end" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center statistics-container">
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-speedometer2"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Tổng lượt truy cập website</span>
                                    <b>
                                        <?php echo $totalVisitCount ?>
                                    </b>
                                    <a class="text-end" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-calendar-minus"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Tổng lượt sử dụng voucher</span>
                                    <b>9999</b>
                                    <a class="text-end" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-calendar-minus"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Số lượng mã giảm giá hết hạn</span>
                                    <b>9999</b>
                                    <a class="text-end" href="#">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>

</body>

</html>