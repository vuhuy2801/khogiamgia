<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/general.css">
    <link rel="stylesheet" href="/public/css/admin/statistic.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">

</head>

<body>
    <div class="container-fluid">
        <!-- end -->
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';

            ?>


            <!-- Modal -->
            <div class="modal fade" id="chartModel" tabindex="-1" aria-labelledby="chartModelLable" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="chartModelLable">Biểu đồ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <canvas id="chartStatistics"></canvas>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

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

                                    <a class="text-end" onclick="showChartView('overviewVoucher')">Xem chi tiết</a>
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
                                    <a class="text-end disable">Xem chi tiết</a>
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
                                    <a class="text-end" onclick="showChartView('overviewPost')">Xem chi tiết</a>
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
                                    <a class="text-end" onclick="showChartView('overviewWebsite')">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-calculator"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Tổng lượt sử dụng voucher</span>
                                    <b>
                                        <?php echo $totalVoucherUsed ?>
                                    </b>
                                    <a class="text-end disable">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-4 statistics">
                                    <div class="round-icon"><i class="bi bi-ticket-fill"></i></div>
                                </div>
                                <div class="col-8 d-flex  flex-column statistics">
                                    <span>Tổng số lượng mã giảm giá hiện có</span>
                                    <b>
                                        <?php echo $totalVoucher ?>
                                    </b>
                                    <a class="text-end" onclick="showChartView('overviewTotalVoucher')">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
    var dataChartVoucher = <?php echo json_encode($chartVoucher); ?>;
    var dataChartPost = <?php echo json_encode($chartPost); ?>;
    var dataChartWebsite = <?php echo json_encode($chartWebsiteAccess); ?>;
    var dataChartVoucherCountByProvider = <?php echo json_encode($chartVoucherCountByProvider); ?>;
    </script>

    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js
"></script>

    <script src="/public/js/admin/statistic/chartView.js"></script>

</body>

</html>