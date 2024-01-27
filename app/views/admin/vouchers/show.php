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
</head>


<body>
    <div class="container-fluid">
        <!-- end -->
        <div class="row flex-nowrap">
            <?php
                require_once 'app/views/partials/sidebar.php';
                require_once 'app/views/admin/vouchers/deleteModal.php';
                require_once 'lib/convertDate.php';
                require_once 'app/views/admin/vouchers/generalProcessing.php';
                require_once 'app/controllers/admin/VoucherController.php';
            ?>

            <!-- end sidebar -->
            <div class="col px-3 py-3 wrapContent position-relative">
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
                            <a class="addLink text-white" href='create'>Thêm</a>
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
                                    echo "<td class='item_table'>" . $typeDisount[$voucher['discountType']] ."</td>";
                                    echo "<td class='item_table'>" . $listSupplier[$voucher['supplierId']] . "</td>";
                                    echo "<td class='item_table'>" . convertDate($voucher['expiresAt']) ."</td>";
                                    $statusClass = ($voucher['status'] == 0) ? 'status-inactive' : 'status-active';
                                    echo "<td class='item_table '><p class='item_status my-0 rounded-3 " . $statusClass . "'>" . $statusVoucher[$voucher['status']] . "</p></td>";
                        
                                    echo "<td class='item_table'>
                                        <a class='px-1 action_detail' href='detail?id=" . urlencode($voucher['voucherId']) .  "'><i class='bi bi-eye-fill'></i></a>
                                        <a class='px-1 action_edit' href='edit?id=" . urlencode($voucher['voucherId']) ."'><i class='bi bi-pencil-square'></i></a>
                                        <a href='' class='delete-voucher px-1' data-voucher-id='" . urlencode($voucher['voucherId']) . "' data-bs-toggle='modal' data-bs-target='#deleteVoucher'><i class='bi bi-trash'></i></a>
                                     </td>";
                                     echo "</tr>" ; } ?>
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