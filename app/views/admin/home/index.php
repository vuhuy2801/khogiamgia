<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/general.css">
    <link rel="stylesheet" href="/public/css/admin/home.css">
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
                                <div class="col-7 statistics">
                                    <span>Số người truy cập hiện tại</span> <br>
                                    <b>
                                        <?php echo $RealtimeUserCount ?>
                                    </b>
                                </div>
                                <div class="col-5 d-flex  justify-content-end ">
                                    <div class="round-icon"><i class="bi bi-people"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-7 statistics">
                                    <span>Số lượt truy cập hôm nay</span> <br>
                                    <b>
                                        <?php echo $TotalVisitCountToday ?>
                                    </b>
                                </div>
                                <div class="col-5 d-flex  justify-content-end ">
                                    <div class="round-icon"><i class="bi bi-speedometer2"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-modern">
                            <div class="row">
                                <div class="col-8 statistics">
                                    <span>Số lượng sử dụng voucher hôm nay</span> <br>
                                    <b>9999</b>
                                </div>
                                <div class="col-4 d-flex  justify-content-end ">
                                    <div class="round-icon"><i class="bi bi-basket"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-modern card-buttom">
                            <div class="row">
                                <h4>Thông kê lượt truy cập hôm nay</h4>
                                <canvas id="chartStatistics"></canvas>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js
"></script>
    <script>
        let ctx = document.getElementById('chartStatistics').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                // data time 24h
                labels: ['00h', '01h', '02h', '03h', '04h', '05h', '06h', '07h', '08h', '09h', '10h', '11h', '12h',
                    '13h', '14h', '15h', '16h', '17h', '18h', '19h', '20h', '21h', '22h', '23h'
                ],
                datasets: [{
                    label: 'Số lượt truy cập',
                    data: <?php echo json_encode($VisitCount24h); ?>,
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    borderColor: "rgba(0, 123, 255, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },

        });

    </script>

</body>

</html>