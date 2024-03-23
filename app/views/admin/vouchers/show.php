<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mã giảm giá</title>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/promotion.css">
    <link rel="stylesheet" href="/public/css/admin/vouchers.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">
</head>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>

<body>
    <div class="container-fluid">

        <!-- end -->
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            ?>

            <!-- end sidebar -->
            <div class="col px-3 py-3 wrapContent position-relative">

                <?php
                if (isset($_SESSION['success_message'])) {
                    $successMessage = $_SESSION['success_message'];
                    echo "<div class=''>
                    <div id='successAlert' class='alert alert-success d-flex align-items-center' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                        <div>
                        $successMessage
                        </div>
                    </div>
                    </div>";
                    unset($_SESSION['success_message']);
                    echo "<script type='text/javascript'>
                    setTimeout(function() {
                        const elementAlert = document.getElementById('successAlert');
                        elementAlert.parentNode.removeChild(elementAlert);
                    }, 3000);
                    </script>";
                }
                ?>

                <div class="mt-5 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        Danh sách mã giảm giá
                    </h3>

                    <div class="d-flex align-items-center">
                        <div class="input-group mx-3 container_search">
                            <input type="text" class="form-control input-search" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button id="searchBtn" class="btn btn-outline-secondary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>

                        <button id="btnAdd" class="btn btn-primary">
                            <a class="addLink text-white" href=' them'>Thêm</a>
                        </button>
                    </div>
                </div>


                <div class="wrap_table  rounded-3">
                    <table class="table table-hover mb-4">
                        <thead class='head_item'>
                            <tr>
                                <th class="table_item" scope="col">MÃ GIẢM GIÁ</th>
                                <th class="table_item" scope="col">TÊN MÃ GIẢM GIÁ</th>
                                <th class="table_item" scope="col">LOẠI MÃ GIẢM GIÁ</th>
                                <th class="table_item" scope="col">NHÀ CUNG CẤP</th>
                                <th class="table_item" scope="col">NGÀY HẾT HẠN</th>
                                <th class="table_item" scope="col">TRẠNG THÁI</th>
                                <th class="table_item" scope="col">THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody class="body_item">
                            <?php

                            $vouchersPerPage = 10;
                            $totalVouchers = count($vouchers);

                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                            $totalPages = ceil($totalVouchers / $vouchersPerPage);

                            $start = ($currentPage - 1) * $vouchersPerPage;
                            $end = $start + $vouchersPerPage;
                            $paginatedVoucher = array_slice($vouchers, $start, $vouchersPerPage);
                            $hidePagination = $totalPages <= 1;

                            foreach ($paginatedVoucher as $index => $voucher) {
                                echo "<tr>";
                                echo "<td class='item_table' scope='row'>" . $voucher['voucherId'] . "</td>";
                                echo "<td class='item_table'>" . $voucher['voucherName'] . "</td>";
                                echo "<td class='item_table'>" . $typeDisount[$voucher['discountType']] . "</td>";
                                echo "<td class='item_table'>" . $listSupplier[$voucher['supplierId']] . "</td>";
                                echo "<td class='item_table'>" . convertDate($voucher['expiresAt']) . "</td>";
                                $statusClass = ($voucher['status'] == 0) ? 'status-inactive' : 'status-active';
                                echo "<td class='item_table '><p class='item_status my-0 rounded-3 " . $statusClass . "'>" . $statusVoucher[$voucher['status']] . "</p></td>";

                                echo "<td class='item_table'>
                                        <a class='px-1 action_detail' href='chi-tiet?id=" . urlencode($voucher['voucherId']) .  "'><i class='bi bi-eye-fill'></i></a>
                                        <a class='px-1 action_edit' href='cap-nhat?id=" . urlencode($voucher['voucherId']) . "'><i class='bi bi-pencil-square'></i></a>
                                        <a href='' class='delete-voucher px-1' data-voucher-id='" . urlencode($voucher['voucherId']) . "' data-bs-toggle='modal' data-bs-target='#deleteVoucher'><i class='bi bi-trash'></i></a>
                                     </td>";
                                echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                    <nav class="  py-2" aria-label="Page navigation example"
                        <?php echo $hidePagination ? 'style="display: none;"' : ''; ?>>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                                <a class="page-link"
                                    href="?page=<?php echo ($currentPage > 1) ? ($currentPage - 1) : 1; ?>">Previous</a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?php echo ($currentPage == $i) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>
                            <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                                <a class="page-link"
                                    href="?page=<?php echo ($currentPage < $totalPages) ? ($currentPage + 1) : $totalPages; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Button trigger modal -->

                <form name="delete-voucher-form" method="POST"></form>

            </div>
        </div>

    </div>


    <script src="
    https://cdn.jsdelivr.net/npm/dayjs@1.11.10/dayjs.min.js
    "></script>
    <script>
    const now = dayjs();
    const formattedTime = now.format('DD/MM/YY HH:mm');
    </script>

    <script src="/public/js/admin/vouchers/show.js"> </script>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>



</body>

</html>