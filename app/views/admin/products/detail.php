<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/admin/posts.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            require_once 'app/views/partials/sidebar.php';
            require_once 'app/views/admin/products/deleteModal.php';
            require_once 'lib/convertDate.php';
            require_once 'app/views/admin/products/generalProcessing.php';
            require_once 'app/controllers/admin/ProductController.php';
            $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
            $productController = new ProductController();
            $product = $productController->getDetail($id);
            $prices = $productController -> getPrices($id);
            $listPrices = array();
            $listDates = array();
            function convertDateChart($inputDate) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timestamp = strtotime($inputDate);
                return date('d/m/y', $timestamp);
            }
            foreach ($prices as $index => $price) {
                $listPrices[] = $price['currentPrice'];
                $listDates[] = convertDateChart($price['date']);
            }
            ?>

            <div class="col px-3 py-3 wrapContent">
                <div class="mt-4">
                    <h3 class="mt-3 mb-3"><?php echo $product['productName'] ?>
                    </h3>

                    <div class="row pt-1">
                        <div class="d-flex justify-content-between px-3 mb-4">
                            <a href="show" class="my-auto text-decoration-none back_home"><i
                                    class="bi bi-arrow-left mx-1"></i>Quay
                                lại</a>
                            <div>
                                <a class="btn btn-danger mx-1" data-product-id='<?php echo $id ?>'
                                    data-bs-toggle='modal' data-bs-target='#deleteProduct'><i
                                        class='mx-1 bi bi-trash'></i>Xóa</a>
                                <a class="btn btn-primary" href="<?php echo 'edit?id='.$id ?>"><i
                                        class='mx-1 bi bi-pencil-square'></i>Sửa</a>
                            </div>

                        </div>
                        <div class="col-8">
                            <form class="wrap_detail rounded-3 px-3 pt-3 pb-5" id="formSubmit">

                                <div class="form-group">
                                    <label class="label_input" for="link">Link sản phẩm</label>
                                    <input type="text" class="form-control" value="<?php echo $product['link'] ?>"
                                        readonly id="link" name="link">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="productName">Tên sản phẩm</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $product['productName'] ?>" readonly id="productName"
                                        name="productName">
                                </div>
                                <div class="form-group mt-2">
                                    <label class="label_input" for="productId">ID sản phẩm</label>
                                    <input type="text" class="form-control" value="<?php echo $product['productID'] ?>"
                                        readonly id="productId" name="productId">
                                </div>
                                <div class="row">
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="soldCount">Lượt bán</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $product['soldCount'] ?>" readonly id="soldCount"
                                            name="soldCount">
                                    </div>
                                    <div class="form-group mt-2 col">
                                        <label class="label_input" for="rateCount">Lượt đánh giá</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $product['rateCount'] ?>" readonly id="rateCount"
                                            name="rateCount">
                                    </div>
                                </div>
                                <div class="form-group col mt-3">
                                    <label class="label_input" for="status">Trạng thái</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $statusProduct[$product['status']] ?>" readonly id="status"
                                        name="status">
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-text label_right"><small class="text-body-secondary">Hình ảnh</small>
                                    </p>
                                    <hr>
                                </div>
                                <div class="px-4 mb-5 wrap_img_detail">
                                    <img src="<?php echo $product['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body pb-1">
                                    <p class="label_right">Thông tin</p>
                                    <hr>
                                </div>
                                <div class="px-3">
                                    <div class="mb-3">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <p class="label_input">Thời gian tạo: <span
                                            class="float-end date_value"><?php echo convertDateFormat($product['createdAt']) ?></span>
                                    </p>
                                    <p class="label_input">Thời gian cập nhật: <span
                                            class="float-end date_value"><?php echo convertDateFormat( $product['updatedAt']) ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form name="delete-product-form" method="POST"></form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/public/js/admin/products/detail.js"> </script>
    <script src="/public/js/bootstrap/bootstrap.bundle.min.js"> </script>
    <script>
    const ctx = document.getElementById('myChart');
    let values = <?php echo json_encode($listPrices); ?>;
    let labels = <?php echo json_encode($listDates); ?>;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: "Giá sản phẩm",
                data: values,
                backgroundColor: "#B1A5FF   ",
                borderColor: "#B1A5FF",
                borderWidth: 3,

                pointBackgroundColor: "#B1A5FF",
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },


        }
    });
    </script>

</body>

</html>